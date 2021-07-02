<?php

namespace App\Http\Controllers;

use App\Courses;
use App\OtherInstitutions;
use App\OtherInstitutionStudents;
use App\OtherInstitutionVideos;
use App\OtherInstitutionViewsLikes;
use App\SecStudents;
use App\SecVideos;
use App\SecVideoViewsLikes;
use App\Universities;
use App\Video;
use App\Videos;
use App\RecentVideos;
use App\Students;
use App\Faculties;
use App\GetRandomID;
use App\VideoComments;
use App\VideoViewsLikes;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('admin.students')->with('students', $students);
    }

    public function verifyCode(){
        if (Session::get("code") == request()->get("code")){

        }
    }
    public function viewAssignment($id)
    {
        return view('student.viewAssignments');
    }
    public function login()
    {
        session(['link' => url()->previous()]);
        return view('student.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function videoComments(Request $request, GetRandomID $random)
    {
        $request->request->add(['comment_id' => $random->getId()]);
        if (!empty($request->get('comment'))) {
            VideoComments::create($request->all());
        }
        $count_comments = VideoComments::where('vid_id', $request->get('vid_id'))->orderBy('created_at', 'DESC')->count();

        $comments = VideoComments::where('vid_id', $request->get('vid_id'))->orderBy('created_at', 'DESC')->get();
        $content = "<div class='mt-3 '>";
        foreach ($comments as $items) {
            $content .= "<h5 class='ml-3' style='font-weight:600; margin-bottom: 2px;'>" . $items->user_email . "</h5>";
            $content .= "<p class='ml-3 mb-3' style='margin-bottom: 2px;'>" . $items->comment . "</p>";
            //            $content .= "<a  href='#' class='ml-3 like-comment'   data-id='". $items->comment_id ."' style='color:black; font-size: 12px;'><i class=\"fa fa-thumbs-up\"> </i>&nbsp;<span id='comment-likes'>2345</span></a>
            //                        <a href='#' class='ml-3 dislike-comment' style='font-size: 12px; color:black;'><i class=\"fa fa-thumbs-down\"> </i>  <span id='comment-likes'>&nbsp;2345</span></a></p>";s
        }
        $content .= "</div>";
        $request->request->add(['count_comments' => $count_comments]);

        $request->request->add(['uploaded' => 'true']);
        $request->request->add(['content' => $content]);
        $request->request->add(['content' => $content]);
        return response()->json($request->all());
    }
    public function uploadViews(Request $request)
    {
        $options = $request->get('options');
        if ($options == "sec") {

            if (SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'views' => 1
                ]);
            } else {
                SecVideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'views' => 1
                ]);
            }
            return response()->json([$request->all()]);
        } elseif ($options == "uni") {

            if (VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'views' => 1
                ]);
            } else {
                VideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'views' => 1
                ]);
            }
            return response()->json([$request->all()]);
        } elseif ($options == "others") {

            if (OtherInstitutionViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                OtherInstitutionViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'views' => 1
                ]);
            } else {
                OtherInstitutionViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'views' => 1
                ]);
            }
            return response()->json([$request->all()]);
        }
    }
    public function uploadThumbsUp(Request $request)
    {
        $options = $request->get('options');
        if ($options == "sec") {

            if (SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {
                SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 0,
                    'thumbs_up' => 1
                ]);
            } else {
                SecVideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_up' => 1
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(SecVideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(SecVideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())
            ]);
        } elseif ($options == "uni") {

            if (VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {
                VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 0,
                    'thumbs_up' => 1
                ]);
            } else {
                VideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_up' => 1
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(VideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(VideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())
            ]);
        } elseif ($options == "others") {


            if (OtherInstitutionViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {
                OtherInstitutionViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 0,
                    'thumbs_up' => 1
                ]);
            } else {
                OtherInstitutionViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_up' => 1
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(OtherInstitutionViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(OtherInstitutionViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())
            ]);
        }
    }
    public function uploadThumbsDown(Request $request)
    {
        $options = $request->get('options');
        if ($options == "sec") {
            if (SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                SecVideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 1,
                    'thumbs_up' => 0
                ]);
            } else {
                SecVideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_down' => 1,
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(SecVideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(SecVideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())

            ]);
        } elseif ($options == "uni") {

            if (VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 1,
                    'thumbs_up' => 0
                ]);
            } else {
                VideoViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_down' => 1,
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(VideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(VideoViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())

            ]);
        } elseif ($options == "others") {

            if (OtherInstitutionViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->count() > 0) {

                VideoViewsLikes::where('user_email', $request->get('user_email'))->where('vid_id', $request->get('vid_id'))->update([
                    'thumbs_down' => 1,
                    'thumbs_up' => 0
                ]);
            } else {
                OtherInstitutionViewsLikes::create([
                    'vid_id' => $request->get('vid_id'),
                    'user_email' => $request->get('user_email'),
                    'thumbs_down' => 1,
                ]);
            }
            return response()->json([
                'thumbs_down' => $this->thousandsCurrencyFormat(OtherInstitutionViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_down', 1)->count()),
                'thumbs_up' => $this->thousandsCurrencyFormat(OtherInstitutionViewsLikes::where('vid_id', $request->get('vid_id'))->where('thumbs_up', 1)->count())

            ]);
        }
    }

    public function thousandsCurrencyFormat($num)
    {

        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;
        }

        return $num;
    }
    public function dashboard()
    {
        return view('student.index');
    }

    public function videos()
    {

        if (Auth::user()->institution == "uni") {
            $level = Students::where('email', Auth::user()->email)->value('level');
            $faculty = Students::where('email', Auth::user()->email)->value('faculty');
            $department = Students::where('email', Auth::user()->email)->value('department');
            $university = Students::where('email', Auth::user()->email)->value('university');
            $level = Students::where('email', Auth::user()->email)->value('level');

            $rec_videos =  Courses::where("courses.dept_id", $department)
                ->where('courses.level', $level)
                ->where('videos.publish', 1)
                ->orderBy('videos.created_at', 'DESC')
                ->join('videos', 'courses.course_code', '=', 'videos.course_code')->get();

            if (count($rec_videos) == 0) {

                $rec_videos =  Courses::where("courses.dept_id", $department)
                    ->inRandomOrder()
                    ->where('courses.level', $level)
                    ->where('videos.publish', 1)
                    ->orderBy('videos.created_at', 'DESC')
                    ->join('videos', 'courses.course_code', '=', 'videos.course_code')->get();
            }
        } elseif (Auth::user()->institution == "sec") {
            $class = SecStudents::where('email', Auth::user()->email)->value('student_class');
            $rec_videos = Videos::where('class', $class)->orderBy('created_at', 'DESC')->where('publish', 1)->get();
            if (count($rec_videos) == 0) {
                $rec_videos = Videos::random()->orderBy('created_at', 'DESC')->inRandomOrder()->where('publish', 1)->get();
            }
        } elseif (Auth::user()->institution == "others") {
            $level = OtherInstitutionStudents::where('email', Auth::user()->email)->value('institution_level');
            $inst_id = OtherInstitutionStudents::where('email', Auth::user()->email)->value('institution_id');
            $rec_videos = Videos::where('level', $level)->where('institution_id', $inst_id)->orderBy('created_at', 'DESC')->where('publish', 1)->get();
            if (count($rec_videos) == 0) {
                $rec_videos = Videos::where('institution_id', $inst_id)->inRandomOrder()->orderBy('created_at', 'DESC')->where('publish', 1)->get();
            }
        }
        return view('student.videos')->with('rec_videos', $rec_videos);
    }

    public function signUpTutorial()
    {
        return view('signup_tutorial');
    }
    public function profile()
    {
        return view('student.profile');
    }
    public function showPassword()
    {
        return view('student_password');
    }
    public function video($id)
    {
        if (!Auth::check()) {
            return redirect()->intended('/signup-tutorial')->with('errmsg', 'Unauthorized Access')->with('class', 'danger');;
        }
        if (Auth::check() && Auth::user()->role != "S") {
            return redirect()->intended('/signup-tutorial')->with('errmsg', 'Unauthorized Access')->with('class', 'danger');;
        }
        $options = Auth::user()->institution;

        RecentVideos::create([
            'vid_id' => $id,
            'email' => Auth::user()->email
        ]);

        $video = Videos::where('vid_id', $id)->value('instructor_email');
        $otherInstitutionVideos = Videos::leftJoin('instructors', 'instructors.email', '=', 'videos.instructor_email')->where('videos.publish', 1)->get();
        return view('student.video', ['otherInstitutionVideos' => $otherInstitutionVideos, 'options' => $options, 'vid_id' => $id, 'otherIns' => $video]);
    }

    public function profilePics()
    {
        return view('student.student_inner_profile');
    }

    public function links()
    {
        return view('student.links');
    }
    public function info()
    {
        $universities = Universities::all();
        $faculties = Faculties::all();
        $options = Auth::user()->institution;
        $institutions = OtherInstitutions::all();
        if ($options == "sec") {
            $user = SecStudents::where('email', Auth::user()->email)->get();
        } elseif ($options == "others") {
            $institutions = OtherInstitutions::all();
            $user = OtherInstitutionStudents::where('email', Auth::user()->email)->get();
        } elseif ($options == "uni") {
            $user = Students::where('email', Auth::user()->email)->get();
        }
        return view('student.student_info', ['user' => $user])
            ->with('faculties', $faculties)
            ->with('universities', $universities)
            ->with('institutions', $institutions)
            ->with('universities', $universities);
    }

    public function profiles()
    {
        return view('student.student_inner_profile');
    }
    public function updateStudentInfo(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'phone' => 'required',
                'fac_id' => 'required',
                'dept_id' => 'required'
            ],
            [
                'fac_id.required' => 'This Field is required',
                'dept_id.required' => 'This Field is required'
            ]
        );

        try {

            $options = Auth::user()->institution;

            if ($options == "uni") {
                $request->validate(
                    [
                        'uni' => 'required|string|max:50',
                        'level' => 'required|string|max:50'
                    ],
                    [
                        'uni.required' => 'University  is required'
                    ]
                );

                Students::where('email', Auth::user()->email)->update([
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'phone' => $request->get('phone'),
                    'university' => $request->get('uni'),
                    'faculty' => $request->get('fac_id'),
                    'department' => $request->get('dept_id'),
                    'level' => $request->get('level')
                ]);
            } elseif ($options == "others") {

                OtherInstitutionStudents::where('email', Auth::user()->email)->update([
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'phone' => $request->get('phone'),
                    'institution_id' => $request->get('fac_id'),
                    'institution_level' => $request->get('dept_id')
                ]);
            } elseif ($options == "sec") {

                SecStudents::where('email', Auth::user()->email)->update([
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'phone' => $request->get('phone'),
                    'student_class' => $request->get('dept_id'),
                    'school_name' => $request->get('fac_id')
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'msg' => 'error',
                'errors' => $e->errors()
            ], 422);
        }
        return response()->json($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }
}
