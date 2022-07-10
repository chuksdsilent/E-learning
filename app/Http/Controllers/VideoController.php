<?php

namespace App\Http\Controllers;


use App\OtherInstitutionCourses;
use App\OtherInstitutions;
use App\OtherInstitutionVideos;
use App\OtherInstitutionViewsLikes;
use App\SecVideos;
use App\SecVideoViewsLikes;
use App\Subjects;
use App\VideoComments;
use DateTime;
use App\Video;
use App\RecentVideos;
use App\Videos;
use App\Courses;
use App\Departments;
use App\GetRandomID;
use App\Universities;
use App\VideoViewsLikes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use Illuminate\Support\Facades\DB;
// use Pawlox\VideoThumbnail\Facade\VideoThumbnail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;

class VideoController extends Controller
{


    public function otherInstitutions()
    {
        $otherInstitutions = OtherInstitutions::all();
        return view('instructor.other_institutions', ['otherInstitutions' => $otherInstitutions]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $videos = Videos::where('instructor_email', Auth::user()->email)->get();
        return view('instructor.videos')->with('videost', $videos);
    }

    public function otherInsVideo()
    {
        $otherInsvideos = Videos::where('instructor_email', Auth::user()->email)->orderBy('created_at', 'DESC')->get();
        return view('instructor.other_institution_video')->with('otherInsVideos', $otherInsvideos);
    }
    public function secSchVideo()
    {
        return view('instructor.secVideos');
    }
    public function videos()
    {

        $videos = Videos::where('instructor_email', Auth::user()->email)->join('courses', 'videos.course_id', '=', 'courses.course_id')->get();
        $secVideos = Videos::where('instructor_email', Auth::user()->email)->join('subjects', 'subjects.sub_id', '=', 'videos.subject_id')->get();
        $otherVideos = Videos::where('instructor_email', Auth::user()->email)->join('other_institution_courses', 'other_institution_courses.course_id', '=', 'videos.course_id')->get();

        $collection = collect($videos);
        $mergeOne = $collection->merge($secVideos);
        $myVideos = $mergeOne->merge($otherVideos);

        return view('instructor.videos')->with('videost', $myVideos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otherInstitutions = OtherInstitutions::all();
        $subjects = Subjects::all();
        return view('instructor.video.create', ['otherInstitutions' => $otherInstitutions])->with('subjects', $subjects);
    }

    public function upload(Request $request, GetRandomID $random)
    {
        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();
        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($save->getFile(), $random);
            // return response()->json([
            //     'uni' => $request->get('uni_id'),
            //     'fac' => $request->get('fac_id'),
            //     ]);


        }
        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function saveFile(UploadedFile $file, $random)
    {
        $vid_id = $random->getID();

        // Group files by mime type

        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");
        // Build the file path
        $finalPath = storage_path("app/public/videos/");

        // move the file name
        //        if ($file->move($finalPath, $fileName))
        // {
        // Videos::create([
        //     'uni_id' => $uni_id,
        //     'fac_id' => $fac_id,
        //     'dept_id' => $dept_id,
        //     'course_id' => $course_id,
        //     'topic_id' => $topic_id
        // ]);
        // }


        //  if($file->move($sub_path, $finalPath));
        //            return response()->json(['vid_id' => $vid_id]);
        //
        //        return response()->json([
        //            'path' => $filePath,
        //            'name' => $fileName,
        //            'mime_type' => $mime
        //        ]);
        // return response()->json($request->get('name1'));
    }


    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    public function storeVideo(Request $request)
    {
        // return $request->gameFile->store('videoFile');
        return response()->json(['data' => $request->videoFile->getClientOriginalExtension()], 200);
    }

    protected function createFilename($file)
    {
        $extension = $file->getClientOriginalExtension();

        $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
        $name = explode('.', $namewithextension)[0];
        $file_name = str_replace(' ', '_', $name);

        // Add timestamp hash to name of the file
        $filename = $file_name . "_" . md5(time()) . "." . $extension;
        return $filename;
    }

    public function storeFile(Request $request, GetRandomID $random)
    {

        $vid_id = $random->getID();
        $dt = new DateTime();
        $date = $dt->format('Y_m_d');
        $this->validateData($request);
        // $file = $request->file('video');

        if ($request->hasFile('videoFile')) {

            $extension = $request->file('videoFile')->getClientOriginalExtension();
            //            $coverPhotoExtention = $request->file('cover_photo')->getClientOriginalExtension();


            $fileNameToStore = $date . '_' . Str::random(20) . '.' . $extension;
            //            $coverPhotoFileName = $date . '_' . Str::random(20) . '.' . $coverPhotoExtention;

            $request->request->add(['vid_id' => $vid_id]);
            $folderName = Departments::where('dept_id', $request->dept_id)->value('name');
            $subFolderName = Courses::where('course_id', $request->course_id)->value('name');

            $folderName = strtolower($folderName);
            $subFolderName = strtolower($subFolderName);

            $folderName = str_replace(' ', '_', $folderName);
            $subFolderName = str_replace(' ', '_', $subFolderName);

            //            $coverPhotoFinalPath =  storage_path('/videos/'. $folderName .'/'. $subFolderName.'/');
            //            $finalPath = storage_path('/videos/'. $folderName .'/'. $subFolderName.'/');
            //
            //            $coverPhotoDBPath = 'videos/'. $folderName .'/'. $subFolderName.'/'. $coverPhotoFileName;
            //            $file_db_path = 'videos/'. $folderName .'/'. $subFolderName.'/'. $fileNameToStore;


            $coverPhotoFinalPath = storage_path('/videos/');
            $finalPath = public_path(). '/videos';

            $coverPhotoDBPath = 'videos/';
            $file_db_path = 'videos/';


            $video_path = 'videos/' . $fileNameToStore;
            //            $coverPhotoPath = 'videos/'. $coverPhotoFileName;

            $thumbnailPath = storage_path('/videos_thumbnail/');
            //            if(!File::isDirectory($folderName)){
            //                File::makeDirectory($folderName, $mode = 0777, true, true);
            //            }
            //            if(!File::isDirectory($subFolderName)){
            //                File::makeDirectory($subFolderName, $mode = 0777, true, true);
            //Move Uploaded File


            $str = $request->get('course_id');
            $course = explode(",", $str);
            //            if (($request->videoFile->move($finalPath, $fileNameToStore)) && ($request->cover_photo->move($coverPhotoFinalPath, $coverPhotoFileName))) {
            if ($request->videoFile->move($finalPath, $fileNameToStore)) {

                $depts = $request->get("gencourse");
                $depts = explode(",", $depts);

                $str = $request->get('course_id');
                $course = explode(",", $str);

                if (is_null($request->get('dept_id'))) {
                    for ($i = 0; $i < count($depts); $i++) {
                        Videos::create([
                            'instructor_email' => Auth::user()->email,
                            'uni_id' => $request->get('uni_id'),
                            'fac_id' => $request->get('fac_id'),
                            'dept_id' => $depts[$i],
                            'topic_id' => "No topic",
                            'course_code' => $course[0],
                            'course_id' =>  $course[1],
                            'level' => $request->get('level'),
                            'semester' => $request->get('semester'),
                            'vid_id' => Str::random(50),
                            'title' => $request->get('title'),
                            'institution_id' => $request->get('institution_id'),
                            'description' => $request->get('description'),
                            'vid_path' => $video_path,
                            'status' => $request->get('status'),
                            'class' => $request->get('class'),
                            'subject_id' => $request->get('subject_id'),

                            //                         'cover_photo' => $coverPhotoPath
                            'cover_photo' => "No Photo"
                        ]);
                    }
                } else {
                    Videos::create([
                        'instructor_email' => Auth::user()->email,
                        'uni_id' => $request->get('uni_id'),
                        'fac_id' => $request->get('fac_id'),
                        'dept_id' => $request->get('dept_id'),
                        'topic_id' => "No topic",
                        'course_code' => $course[0],
                        'course_id' =>  $course[1],
                        'level' => $request->get('level'),
                        'semester' => $request->get('semester'),
                        'vid_id' => $request->get('vid_id'),
                        'title' => $request->get('title'),
                        'institution_id' => $request->get('institution_id'),
                        'description' => $request->get('description'),
                        'vid_path' => $video_path,
                        'status' => $request->get('status'),
                        'class' => $request->get('class'),
                        'subject_id' => $request->get('subject_id'),
                        //                         'cover_photo' => $coverPhotoPath
                        'cover_photo' => "No Photo"
                    ]);
                }

                //    VideoThumbnail::createThumbnail($video_path, $thumbnailPath, $fileName, $second, $width = 640, $height = 480);
            }
            //            }else{

            //                }
            // $request->file('video')->move($sub_path, $fileNameToStore);
            //            }
            // $request->file('video')->move($sub_path, $fileNameToStore);

            // return redirect()->back()->with('msg', 'Video Upload successful')->with('class', 'success')->withInput();
            //            return response()->json($request->all());
        }

        // return redirect()->back()->with('msg', 'No Video uploaded')->with('class', 'danger');


    }


    public function storeSecVideo(Request $request, GetRandomID $random)
    {

        $vid_id = $random->getID();
        $dt = new DateTime();
        $date = $dt->format('Y_m_d');
        //  $this->validateData($request);
        // $file = $request->file('video');


        $request->validate([
            'user_email' => 'required',
            'title' => 'required',
            'overview' => 'required',

        ], [
            'user_email' => 'Tutor Email is required',
            'title' => 'Title is required',
            'overview' => 'description is required'
        ]);

        if ($request->hasFile('secVideo')) {

            $extension = $request->file('secVideo')->getClientOriginalExtension();
            //            $coverPhotoExtention = $request->file('coverPhoto')->getClientOriginalExtension();

            $fileNameToStore = $date . '_' . Str::random(20) . '.' . $extension;
            //            $coverPhotoFileName = $date . '_' . Str::random(20) . '.' . $coverPhotoExtention;

            $request->request->add(['vid_id' => $vid_id]);

            $coverPhotoFinalPath = storage_path('/videos/');
            $finalPath = storage_path('/videos/');

            $video_path = $finalPath . '/' . $fileNameToStore;
            //            $coverPhotoPath = $coverPhotoFinalPath . '/' . $coverPhotoFileName;

            //            $coverPhotoDBPath = 'videos/' . $coverPhotoFileName;
            $file_db_path = 'videos/' . $fileNameToStore;

            //            $request->request->add(['coverPhoto' => $coverPhotoDBPath]);
            $request->request->add(['secVideos' => $file_db_path]);

            //            Move Uploaded File
            if ($request->secVideo->move($finalPath, $fileNameToStore)) {
                //                if (($request->secVideo->move($finalPath, $fileNameToStore)) && ($request->coverPhoto->move($coverPhotoFinalPath, $coverPhotoFileName))) {

                SecVideos::create([
                    'instructor_email' => Auth::user()->email,
                    'vid_id' => $request->get('vid_id'),
                    'class_id' => $request->get('class_id'),
                    'subject_id' => $request->get('subject_id'),
                    'topic_id' => "No Topic",
                    'title' => $request->get('title'),
                    'description' => $request->get('overview'),
                    'coverPhoto' => "No Cover Photo",
                    //                    'coverPhoto' => $coverPhotoDBPath,
                    'secVideos' => $file_db_path
                ]);
                return response()->json($request->all());
            }
            return response()->json(['data' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video, $id, Request $request)
    {
        $options = $request->get('options');
        $videoComment = VideoComments::where('vid_id', $id)->get();
        return view('instructor.vids', ['vid_id' => $id])->with('options', $options)->with('videoComment', $videoComment);
    }

    public function publishVideo(Request $request)
    {
        $state = $request->get('publish');
        ($state == 0) ? $state = 1 : $state = 0;

        Videos::where('vid_id', $request->get('vid_id'))->update(['publish' => $state]);
        return Video::where('vid_id', $request->get('vid_id'))->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video, $id, Request $request)
    {

        if ($request->get('options') == 'sec') {
            $video_data = SecVideos::where('vid_id', $id)->get();
        } else {
            $video_data = Videos::where('vid_id', $id)->get();
        }
        return view('instructor.video_edit')->with('video_data', $video_data)->with('options', $request->get('options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        // return response()->json($request->all());
        // if($this->validateData($request)){

        if ($request->get('options') == "sec") {
            $videoUploaded = SecVideos::where('vid_id', $request->get('vid_id'))->update(['title' => $request->get('title'), 'description' => $request->get('overview')]);
            if ($videoUploaded) {
                return response()->json(true, 200);
            }
        } else {
            $videoUploaded = Video::where('vid_id', $request->get('vid_id'))->update(['title' => $request->get('title'), 'description' => $request->get('overview')]);
            if ($videoUploaded) {
                return response()->json(true, 200);
            }
        }
        // }

        return response()->json(false, 200);
    }

    public function validateVideoUpdate($request)
    {
        $request->validate([
            'vid_id' => 'required',
            'title' => 'required',
            'overview' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }

    public function validateData($request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'fac_id' => 'required'
            //            'video' => 'required|max:500000|mimes:mp4,mov,ogg'
        ], []);
    }

    public function trending()
    {

        $options = Auth::user()->institution;
        if ($options == "uni") {
            $rec_videos = Videos::where('publish', 1)
                ->leftJoin('video_views_likes', 'video_views_likes.vid_id', '=', 'videos.vid_id')
                ->leftJoin('instructors', 'videos.instructor_email', '=', 'instructors.email')
                ->select(
                    'videos.cover_photo',
                    'instructors.profile_pics',
                    'videos.instructor_email',
                    'videos.title',
                    'videos.vid_id',
                    'video_views_likes.thumbs_up',
                    DB::raw("count(video_views_likes.thumbs_up) AS total_thumbs_up"),
                    DB::raw("count(video_views_likes.views) AS total_views")
                )
                ->groupBy("videos.vid_id")
                ->orderBy('total_views', 'DESC')
                ->get();
            if (count($rec_videos) == 0) {
            }
            return view('student.trending')->with('rec_videos', $rec_videos);
        } elseif ($options == "sec") {

            $rec_videos = SecVideos::where('sec_videos.publish', 1)
                ->leftJoin('sec_video_views_likes', 'sec_video_views_likes.vid_id', '=', 'sec_videos.vid_id')
                ->leftJoin('instructors', 'sec_videos.instructor_email', '=', 'instructors.email')
                ->select(
                    'instructors.profile_pics',
                    'sec_videos.instructor_email',
                    'sec_videos.coverPhoto',
                    'sec_videos.title',
                    'sec_videos.vid_id',
                    'sec_video_views_likes.thumbs_up',
                    DB::raw("count(sec_video_views_likes.thumbs_up) AS total_thumbs_up"),
                    DB::raw("count(sec_video_views_likes.views) AS total_views")
                )
                ->groupBy("sec_videos.vid_id")
                ->orderBy('total_views', 'DESC')
                ->get();
            return view('student.trending')->with('rec_videos', $rec_videos);
        } elseif ($options == "others") {

            $rec_videos = OtherInstitutionVideos::where('publish', 1)
                ->leftJoin('other_institution_views_likes', 'other_institution_views_likes.vid_id', '=', 'other_institution_videos.vid_id')
                ->leftJoin('instructors', 'other_institution_videos.instructor_email', '=', 'instructors.email')
                ->select(

                    'instructors.profile_pics',
                    'other_institution_videos.instructor_email',
                    'other_institution_videos.cover_photo',
                    'other_institution_videos.title',
                    'other_institution_videos.vid_id',
                    'other_institution_views_likes.thumbs_up',
                    DB::raw("count(other_institution_views_likes.thumbs_up) AS total_thumbs_up"),
                    DB::raw("count(other_institution_views_likes.views) AS total_views")
                )
                ->groupBy("other_institution_videos.vid_id")
                ->orderBy('total_views', 'DESC')
                ->get();
            return view('student.trending')->with('rec_videos', $rec_videos);
        }
    }

    public function getVideo()
    {
        return 2;
    }
    public function subscriptions()
    {
        return view('student.subscriptions');
    }

    public function history()
    {
        return view('student.history');
    }

    public function likedVideos()
    {
        $options = Auth::user()->institution;

        $likedCourses = RecentVideos::where('recent_videos.email', Auth::user()->email)
            ->join('videos', 'recent_videos.vid_id', '=', 'videos.vid_id')
            ->groupBy('recent_videos.vid_id')
            ->get(['videos.title', 'videos.description', 'videos.vid_id']);



        return view('student.liked_videos')->with('likedCourses', $likedCourses);
    }

    public function autoComplete()
    {
        $search_item = $_GET['query'];

        Courses::where('course_code', $search_item)->get();

        return response()->json([
            "query" => "Unit",
            [
                "suggestions" => Courses::where('course_code', $search_item)->get(['value'])
            ]
        ]);
    }

    public function searchedVideos(Request $request)
    {
        $options = Auth::user()->institution;
        $search_item = $request->get('search_item');
        $universities = Universities::all();
        $institution = $request->get('institution');
        $level = $request->get('level');
        $course = $request->get('course');


        $uni = $request->get('uni_id');
        $fac = $request->get('fac_id');
        $dept = $request->get('dept_id');
        $level = $request->get('level_id');
        $semester = $request->get('semester_id');


        if ($course = $request->get('course') != "") {
            $data =  $this->searchOtherInstitutionWithLevel($request);
        } elseif ($course = $request->get('course') != "") {
            $data =  $this->searchOtherInstitutionWithCourse($request);
        } elseif ($request->get('search_class_id') != "") {
            $data =  $this->secSearchWithClass($request);
        } elseif ($request->get('search_sub_id') != "") {
            $data =  $this->secSearchWithSubject($request);
        } elseif ($level != ""  && $search_item != "") {
            $data =  $this->levelSearchWithData($request);
        } elseif ($level != "") {
            $data =  $this->levelSearch($request);
        } elseif ($dept != "" && $search_item != "") {
            $data =   $this->deptSearchWithData($request);
        } elseif ($dept != "") {
            $data =  $this->deptSearch($request);
        } elseif ($fac != "" && $search_item != "") {
            $data =  $this->facSearchWithData($request);
        } elseif ($fac != "") {
            $data =  $this->facSearch($request);
        } elseif ($request->get('search_item') != "") {
            $data = $this->searchWithData($request);
        } else {
            $data = $this->searchWithoutData();
        }
        return view('student.searched_videos')->with('searchedCourses', $data)->with('universities', $universities)->with('options', 'sec');
    }

    public function searchWithoutData()
    {

        return Videos::orderBy('created_at', 'DESC')->limit(50)->get();
    }
    public function searchOtherInstitutionWithCourse(Request $request)
    {
        $search_item = $request->get('search_item');
        $universities = Universities::all();
        $institution = $request->get('institution');
        $level = $request->get('level');
        $course = $request->get('course');

        if (!$search_item == "") {
            if (!$level == "") {
                $searchedCourses = OtherInstitutionCourses::where(function ($q) use ($search_item, $institution, $level, $course) {
                    $q->where('other_institution_courses.level', $level)
                        ->where('publish', 1)
                        ->where('other_institution_courses.course_code', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.level', $level)
                        ->where('publish', 1)
                        ->where('videos.title', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.level', $level)
                        ->where('publish', 1)
                        ->where('videos.description', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.course_id', $course)
                        ->where('publish', 1)
                        ->where('videos.description', 'like', '%' . $search_item . '%');
                })
                    ->join('videos', 'other_institution_courses.course_id', '=', 'videos.course_id')
                    ->leftJoin('other_institution_views_likes', 'other_institution_views_likes.vid_id', '=', 'videos.vid_id')
                    ->select(
                        'videos.instructor_email',
                        'videos.semester',
                        'videos.level',
                        'videos.title',
                        'other_institution_views_likes.views',
                        'videos.vid_id',
                        'videos.description',
                        'videos.created_at',
                        'videos.publish'
                    )->orderBy('videos.created_at', 'DESC')->groupBy('videos.vid_id')
                    ->get();
                return $searchedCourses;
            }
        }
    }

    public function searchOtherInstitutionWithLevel(Request $request)
    {

        $search_item = $request->get('search_item');
        $universities = Universities::all();
        $institution = $request->get('institution');
        $level = $request->get('level');
        $course = $request->get('course');

        if (!$search_item == "") {
            if (!$level == "") {
                $searchedCourses = OtherInstitutionCourses::where(function ($q) use ($search_item, $institution, $level, $course) {
                    $q->where('other_institution_courses.level', $level)
                        ->where('publish', 1)
                        ->where('other_institution_courses.course_code', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.course_id', $course)
                        ->where('publish', 1)
                        ->where('videos.title', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.course_id', $level)
                        ->where('publish', 1)
                        ->where('videos.description', 'like', '%' . $search_item . '%')

                        ->orWhere('videos.course_id', $course)
                        ->where('publish', 1)
                        ->where('videos.description', 'like', '%' . $search_item . '%');
                })
                    ->join('videos', 'other_institution_courses.course_id', '=', 'videos.course_id')
                    ->leftJoin('other_institution_views_likes', 'other_institution_views_likes.vid_id', '=', 'videos.vid_id')
                    ->select(
                        'videos.instructor_email',
                        'videos.semester',
                        'videos.level',
                        'videos.title',
                        'other_institution_views_likes.views',
                        'videos.vid_id',
                        'videos.description',
                        'videos.created_at',
                        'videos.publish'
                    )->orderBy('videos.created_at', 'DESC')->groupBy('videos.vid_id')
                    ->get();
                return $searchedCourses;
                return view('student.searched_videos')->with('searchedCourses', $searchedCourses)->with('universities', $universities)->with('options', 'sec');
            }
        }
    }

    public function secSearchWithSubject($request)
    {
        $class = $request->get('search_class_id');
        $subject = $request->get('search_sub_id');
        $search_item = $request->get('search_item');
        $universities = Universities::all();

        if (!empty($search_item)) {
            if (empty($class) && empty($subject)) {
                $searchedSubjects = Videos::where('videos.title', 'like', '%' . $search_item . '%')
                    ->where('videos.subject_id', $subject)
                    ->where('videos.class', $class)
                    ->where('videos.publish', 1)
                    ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->leftJoin('sec_video_views_likes', 'videos.vid_id', '=', 'sec_video_views_likes.vid_id')
                    ->select(
                        'videos.instructor_email',
                        'videos.title',
                        'videos.description',
                        'videos.created_at',
                        'sec_video_views_likes.thumbs_up',
                        'sec_video_views_likes.views',
                        'sec_video_views_likes.thumbs_down',
                        'videos.vid_id'
                    )->orderBy('videos.created_at', 'DESC')->get();
            }
            return $searchedSubjects;
        }
        return redirect()->back();
    }

    public function secSearchWithClass($request)
    {
        $class = $request->get('search_class_id');
        $subject = $request->get('search_sub_id');
        $search_item = $request->get('search_item');
        $universities = Universities::all();

        if (!empty($search_item)) {
            if (empty($class) && empty($subject)) {
                $searchedSubjects = Videos::where('videos.title', 'like', '%' . $search_item . '%')
                    ->where('videos.class', $class)
                    ->where('videos.publish', 1)
                    ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->leftJoin('sec_video_views_likes', 'videos.vid_id', '=', 'sec_video_views_likes.vid_id')
                    ->select(
                        'videos.instructor_email',
                        'videos.title',
                        'videos.description',
                        'videos.created_at',
                        'sec_video_views_likes.thumbs_up',
                        'sec_video_views_likes.views',
                        'sec_video_views_likes.thumbs_down',
                        'videos.vid_id'
                    )->orderBy('videos.created_at', 'DESC')->get();
            }
            return $searchedSubjects;
        }
        return redirect()->back();
    }

    public function uniWithSearchItem($request)
    {

        $fac = $request->get('fac_id');
        $dept = $request->get('dept_id');
        $level = $request->get('level_id');
        $semester = $request->get('semester_id');

        $search_item = $request->get('search_item');
        $universities = Universities::all();

        if (empty($fac) && empty($dept) && empty($level) && empty($semester)) {
            if (!empty($search_item)) {

                return $searchedCourses = Courses::where('courses.course_code', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->orWhere('courses.name', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                    ->where('videos.publish', 1)
                    ->join('videos', 'courses.course_id', '=', 'videos.course_id')
                    ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
                    ->select(
                        'videos.instructor_email',
                        'courses.name',
                        'videos.level',
                        'videos.title',
                        'videos.vid_id',
                        'video_views_likes.views',
                        'videos.description',
                        'videos.instructor_email',
                        'videos.created_at',
                        'videos.publish'
                    )->orderBy('videos.created_at', 'DESC')->get();
            }
        }
    }
    public function facSearch($request)
    {
        $fac = $request->get('fac_id');
        $searchedCourses = Courses::where(function ($q) use ($fac) {
            $q->where('videos.fac_id', $fac)
                ->where('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }
    public function facSearchWithData($request)
    {

        $fac = $request->get('fac_id');
        $search_item = $request->get('search_item');

        return $searchedCourses = Courses::where(function ($q) use ($fac, $search_item) {
            $q->where('videos.fac_id', $fac)
                ->where('courses.course_code', 'like', '%' . $search_item . '%')
                ->where('publish', 1)

                ->orWhere('videos.course_id', 'like', '%' . $search_item . '%')
                ->where('videos.fac_id', $fac)
                ->where('publish', 1)

                ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                ->where('videos.fac_id', $fac)
                ->where('publish', 1)

                ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                ->where('videos.fac_id', $fac)
                ->where('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }


    public function deptSearch($request)
    {
        $dept = $request->get('dept_id');
        $searchedCourses = Courses::where(function ($q) use ($dept) {
            $q->where('courses.dept_id', $dept)
                ->where('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }


    public function deptSearchWithData($request)
    {
        $dept = $request->get('dept_id');
        $search_item = $request->get('search_item');

        $searchedCourses = Courses::where(function ($q) use ($dept, $search_item) {
            $q->where('videos.dept_id', $dept)
                ->where('videos.publish', 1)

                ->orWhere('videos.course_id', 'like', '%' . $search_item . '%')
                ->where('videos.dept_id', $dept)
                ->where('videos.publish', 1)

                ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                ->where('videos.dept_id', $dept)
                ->where('videos.publish', 1)

                ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                ->where('videos.level', $dept)
                ->orWhere('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }


    public function levelSearch($request)
    {

        $level_id = $request->get('level_id');
        $level_id = $level_id . "00";
        $searchedCourses = Courses::where(function ($q) use ($level_id) {
            $q->where('videos.level', $level_id)
                ->where('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }
    public function levelSearchWithData($request)
    {
        $level_id = $request->get('level_id');
        $search_item = $request->get('search_item');


        $searchedCourses = Courses::where(function ($q) use ($level_id, $search_item) {
            $q->where('videos.level', $level_id)
                ->orWhere('publish', 1)

                ->orWhere('courses.course_code', 'like', '%' . $search_item . '%')
                ->where('videos.level', $level_id)
                ->orWhere('publish', 1)

                ->orWhere('videos.course_id', 'like', '%' . $search_item . '%')
                ->where('videos.level', $level_id)
                ->orWhere('publish', 1)

                ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                ->where('videos.level', $level_id)
                ->orWhere('publish', 1)

                ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                ->where('videos.level', $level_id)
                ->orWhere('publish', 1);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }


    public function uniSearch($request)
    {
        $uni = $request->get('uni_id');
        $fac = $request->get('fac_id');
        $dept = $request->get('dept_id');
        $level = $request->get('level_id');
        $semester = $request->get('semester_id');

        if (!empty($search_item)) {
            return $searchedCourses =  $this->searchUniWithData($request, $search_item, $uni, $fac, $dept, $level, $semester);
        } else {
            $searchedCourses = Courses::where('videos.publish', 1)
                ->join('videos', 'courses.course_id', '=', 'videos.course_id')
                ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
                ->select(
                    'videos.instructor_email',
                    'courses.name',
                    'videos.level',
                    'videos.title',
                    'videos.vid_id',
                    'video_views_likes.views',
                    'videos.description',
                    'videos.instructor_email',
                    'videos.created_at',
                    'videos.publish'
                )->orderBy('videos.created_at', 'DESC')->get();

            return $searchedCourses;
        }
        return redirect()->back();
    }

    public function validateSearchItem($request)
    {
        $request->validate([
            'search_item' => 'required'
        ]);
    }

    public function searchUniWithData($request, $search_item, $uni, $fac, $dept, $level, $semester)
    {
        // return $request->all();
        $searchedCourses = "";

        $searchedCourses = Courses::where(function ($q) use ($search_item, $uni, $fac, $dept, $level, $semester) {
            $q->where('courses.uni_id', $uni)
                ->where('courses.fac_id', $fac)
                ->where('courses.dept_id', $dept)
                ->where('publish', 1)
                ->where('videos.level', $level)
                ->where('videos.semester', $semester)
                ->where('courses.course_code', 'like', '%' . $search_item . '%')


                ->orWhere('courses.uni_id', $uni)
                ->where('courses.fac_id', $fac)
                ->where('courses.dept_id', $dept)
                ->where('publish', 1)
                ->where('videos.level', $level)
                ->where('videos.semester', $semester)
                ->where('courses.name', 'like', '%' . $search_item . '%')


                ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                ->where('courses.fac_id', $fac)
                ->where('courses.dept_id', $dept)
                ->where('publish', 1)
                ->where('videos.level', $level)
                ->where('videos.semester', $semester)
                ->where('courses.name', 'like', '%' . $search_item . '%')


                ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                ->where('courses.fac_id', $fac)
                ->where('courses.dept_id', $dept)
                ->where('publish', 1)
                ->where('videos.level', $level)
                ->where('videos.semester', $semester)

                ->orWhere('courses.name', 'like', '%' . $search_item . '%')
                ->where('courses.fac_id', $fac)
                ->where('courses.dept_id', $dept)
                ->where('publish', 1)
                ->where('videos.level', $level)
                ->where('videos.semester', $semester);
        })
            ->join('videos', 'courses.course_id', '=', 'videos.course_id')
            ->leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')
            ->select(
                'videos.instructor_email',
                'courses.name',
                'videos.semester',
                'videos.level',
                'videos.title',
                'videos.uni_id',
                'videos.vid_id',
                'video_views_likes.views',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->groupBy('videos.vid_id')
            ->orderBy('videos.created_at', 'DESC')
            ->get();
        return $searchedCourses;
    }

    private function searchWithData(Request $request)
    {
        $search_item = $request->get('search_item');
        $searchedCourses = Videos::where(function ($q) use ($search_item) {
            $q->where('videos.title', 'like', '%' . $search_item . '%')
                ->where('publish', 1)

                ->orWhere('videos.description', 'like', '%' . $search_item . '%')
                ->where('publish', 1)

                ->orWhere('videos.course_code', 'like', '%' . $search_item . '%')
                ->where('publish', 1)

                ->orWhere('instructors.username', 'like', '%' . $search_item . '%')
                ->orWhere('instructors.first_name', 'like', '%' . $search_item . '%')
                ->orWhere('instructors.last_name', 'like', '%' . $search_item . '%')

                ->where('videos.status', "U")


                ->orWhere('videos.title', 'like', '%' . $search_item . '%')
                ->where('publish', 1);
        })

            ->join('instructors', 'instructors.email', '=', 'videos.instructor_email')
            ->leftJoin('other_institution_views_likes', 'other_institution_views_likes.vid_id', '=', 'videos.vid_id')
            ->leftJoin('video_views_likes', 'video_views_likes.vid_id', '=', 'videos.vid_id')
            ->select(
                'videos.instructor_email',
                'videos.semester',
                'videos.level',
                'videos.title',
                'video_views_likes.views',
                'videos.vid_id',
                'videos.description',
                'videos.created_at',
                'videos.publish'
            )->orderBy('videos.created_at', 'DESC')->groupBy('videos.vid_id')
            ->get();
        return $searchedCourses;
    }
}
