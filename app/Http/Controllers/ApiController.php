<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Departments;
use App\FacultyLevel;
use App\OtherInstitutionCourses;
use App\OtherInstitutionTopics;
use App\OtherInstitutionVideos;
use App\SecTopics;
use App\SecVideos;
use App\Topics;
use App\User;
use App\Videos;
use DateTime;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\RecentVideos;
use App\VideoViewsLikes;
use DB;

class ApiController extends Controller
{

    public function getVideoAttributes(Request $request)
    {

        $id = $request->get('vid_id');

        $email =  $request->get('email');
        if (RecentVideos::where('email', $email)->where('vid_id', $id)->exists()) {
        } else {
            RecentVideos::create([
                'vid_id' => $id,
                'email' => $email
            ]);
        }

        $db_video_path = Videos::where('vid_id', $id)->value('vid_path');
        $file_path = \Storage::url($db_video_path);

        $url = asset("myapp" . $file_path);


        $video = Videos::leftJoin('instructors', 'instructors.email', '=', 'videos.instructor_email')->where('vid_id', $id)->where('videos.publish', 1)->get(['videos.title', 'videos.description', 'videos.vid_id']);

        $like_view_videos = VideoViewsLikes::where('vid_id', $id)
            ->select(DB::raw(" COALESCE(sum(video_views_likes.thumbs_down), 0)  as dislikes"), DB::raw("COALESCE(sum(video_views_likes.views), 0)  as views"), DB::raw("COALESCE(sum(video_views_likes.thumbs_up), 0)  as likes"))
            ->groupby('video_views_likes.vid_id')
            ->get();

        return response()->json(["videos" => $video, "like_views" => $like_view_videos, "vid_path" => $url]);
    }

    public function updatePassword(Request $request)
    {
        header("Access-Control-Allow-Origin: *");

        $request->validate([
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        ], [
            'cpassword.required' => 'Confirm password required',
            'cpassword.same' => 'Password must match',
            'password.min' => 'Password must be 6 characters'

        ]);

        User::where('email', $request->get('email'))->update(['password' => Hash::make($request->get('password'))]);


        try {
            User::where('email', $request->session()->get('email'))->update(['password' => Hash::make($request->get('password'))]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'msg' => 'error',
                'errors' => $e->errors()
            ], 422);
        }

        //        }
        //        return false;
    }
    public function autoComplete(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $search_item =  $request->get('query');
        $options = Auth::user()->institution;

        if ($request->get('query')) {
            $options = Auth::user()->institution;
            if ($options == "sec") {
                $result = SecVideos::where('title', 'regexp', '^' . $search_item)->limit(10)->get(['title']);
            } elseif ($options == "uni") {
                $result = Videos::where('title', 'regexp', '^' . $search_item)->limit(10)->get(['title']);
            } elseif ($options == "others") {
                $result = OtherInstitutionVideos::where('title', 'regexp', '^' . $search_item)->limit(10)->get(['title']);
            }


            //                $result = new Collection();
            //
            //                foreach ($otherDatas as $data){
            //                    $result->push($data->title);
            //                }
            //                foreach ($secDatas as $secData){
            //                    $result->push($secData->title);
            //                }
            //                foreach ($uniDatas as $uniData){
            //                    $result->push($uniData->title);
            //                }

            $val = "<ul style='list-style-type: none'>";

            $i = 0;
            foreach ($result as $data) {
                $val .= "<li class='suggest-list'><a href = 'javascript:;' class='d-block py-2'>" . $data->title . "</a></li>";
                $i++;
            }
            $val .= "<ul>";
        }

        return response()->json($val);
    }
    public function getSecTopics($id)
    {
        header("Access-Control-Allow-Origin: *");
        $topics = SecTopics::where('sub_id', $id)->get();
        return response()->json($topics);
    }
    public function storeInstitutionVideo(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $request->request->add(['vid_id' => Str::random(20)]);
        $request->request->add(['instructor_email' => Auth::user()->email]);
        $dt = new DateTime();
        $date = $dt->format('Y_m_d');

        $this->validateVideoUpload($request);
        if ($request->hasFile('videoFile')) {

            $extension = $request->file('videoFile')->getClientOriginalExtension();
            //            $coverPhotoExtention = $request->file('cover_photo')->getClientOriginalExtension();


            $fileNameToStore = $date . '_' . $request->get('vid_id') . '.' . $extension;
            //            $coverPhotoFileName = $date . '_' . Str::random(20) . '.' . $coverPhotoExtention;

            $coverPhotoFinalPath = storage_path('/videos/');
            $finalPath = storage_path('/videos/');

            $coverPhotoDBPath = 'videos/';
            $file_db_path = 'videos/';

            $video_path = $finalPath . '/' . $fileNameToStore;
            //            $coverPhotoPath = $coverPhotoFinalPath . '/' . $coverPhotoFileName;

            $request->request->add(['video_path' => $file_db_path . '/' . $fileNameToStore]);
            //            $request->request->add(['cover_photo' => $coverPhotoDBPath . '/'. $coverPhotoFileName]);

            //Move Uploaded File
            if ($request->videoFile->move($finalPath, $fileNameToStore)) {
                //                if (($request->videoFile->move($finalPath, $fileNameToStore)) && ($request->cover_photo->move($coverPhotoFinalPath, $coverPhotoFileName))) {
                Video::create([
                    'institution_id' => $request->get('institution_id'),
                    'instructor_email' => Auth::user()->email,
                    'vid_id' => $request->get('vid_id'),
                    'level' => $request->get('level'),
                    'course_id' => $request->get('course_id'),
                    'semester' => $request->get('semester'),
                    'topic_id' => "No topic",
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    //                    'cover_photo' => $request->get('cover_photo'),
                    'status' => 'O',
                    'cover_photo' => "No Cover Photo",
                    'video_path' => $request->get('video_path')
                ]);
            }

            return response()->json($request->all());
        }
    }

    public function validateVideoUpload($request)
    {
        $request->validate([
            'institution_id' => 'required',
            'level' => 'required',
            'course_id' => 'required',
            'semester' => 'required',
            'title' =>  'required',
            'description' =>  'required'
        ]);
    }

    public function getLevel($fac_id)
    {
        header("Access-Control-Allow-Origin: *");
        $level = FacultyLevel::where('fac_id', $fac_id)->value('level');
        $option = "";

        for ($i = 1; $i <= $level; $i + 1) {

            $option .= "<option value='" . $i . "00'>" . $i++ . "00</option>";
        }

        return response()->json($option);
    }

    public function getInstitutionLevel($id)
    {
        header("Access-Control-Allow-Origin: *");
        $level = FacultyLevel::where('fac_id', $id)->value('level');

        $levelOption = "";

        for ($i = 1; $i <= $level; $i++) {
            $levelOption .= "<option value='" . $i . "00'>" . $i . "00</option>";
        }

        return response()->json(['data' => $levelOption]);
    }

    public function getInstitutionCourse()
    {
        header("Access-Control-Allow-Origin: *");
        $id = $_GET['ins'];
        $level = $_GET['level'];

        $courses = OtherInstitutionCourses::where('institution_id', $id)->where('level', $level)->get(['course_name', 'course_code', 'course_id']);

        $coursesOption = "";
        $i = 0;
        foreach ($courses as $course) {
            $coursesOption .= "<option value='" . $course->course_code . "," . $course->course_id . "'>(" . $course->course_code . ") " . $course->course_name . "</option>";
        }
        return response()->json(['data' => $coursesOption]);;
    }

    public function getInstitutionTopics()
    {
        header("Access-Control-Allow-Origin: *");
        $course_id = $_GET['course_id'];
        $topics = OtherInstitutionTopics::where('course_id', $course_id)->get(['topic_id', 'name']);
        return response()->json($topics, 200);
    }
}
