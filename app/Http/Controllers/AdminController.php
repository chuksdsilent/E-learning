<?php

namespace App\Http\Controllers;

use App\Comments;
use App\FacultyLevel;
use App\InstitutionType;
use App\OtherInstitutions;
use App\OtherInstitutionCourses;
use App\OtherInstitutionStudents;
use App\OtherInstitutionTopics;
use App\OtherInstitutionVideos;
use App\OtherInstitutionViewsLikes;
use App\Payments;
use App\SecStudents;
use App\SecVideos;
use App\SecVideoViewsLikes;
use App\Topics;
use App\Universities;
use App\User;
use App\VideoComments;
use App\Videos;
use App\VideoViewsLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use \Illuminate\Support\Str;

class AdminController extends Controller
{
    public function payments(){
        $payments = Payments::orderBy('created_at', 'DESC')->get();
        return view('admin.payments')->with('payments', $payments);
    }
    public function otherVideos()
    {

        $videos = Videos::orderBy('created_at', 'DESC')->where('status', 'O')->get();
        return view('admin.other_institution_videos')->with('videos', $videos);
    }
    public function other_students()
    {
        $students = OtherInstitutionStudents::orderBy('created_at', 'DESC')->get();
        return view('admin.other_institution_students')->with('students', $students);
    }
    public function sec_students()
    {
        $students = SecStudents::orderBy('created_at', 'DESC')->get();
        return view('admin.sec_students')->with('sec_students', $students);
    }
    public function universityPanel()
    {
        $universities = Universities::all();
        return view("admin.university_panel", ['universities' => $universities]);
    }
    public function updateTopic(Request $request)
    {
        OtherInstitutionTopics::where('topic_id', $request->get("topic_id"))->update(['name'=> $request->get('name')]);
        return redirect()->back()->with('success_msg', 'Topic Updated Successfully.');
    }
    public function institutionTopic($id)
    {
        $course_name = OtherInstitutionCourses::where('course_id', $id)->value('course_name');
        $topics = OtherInstitutionTopics::where('course_id', $id)->get();
        return view('admin.institution_topic', ['topics' => $topics, 'course_name' => $course_name]);
    }
    public function createInstitutionTopic(Request $request)
    {
        $name = [];
        $name = explode(",", $request->get('name'));

        for ($i=0; $i<count($name); $i++){
            OtherInstitutionTopics::create([
               'course_id' => $request->get('course'),
               'topic_id' => Str::random(20),
               'level' => $request->get('level'),
               'name' => $name[$i]
            ]);
        }
        return redirect()->back()->with('success_msg', 'Topic Updated Successfully.');
    }

    public function otherInstitutionPanel()
    {
        $institutions = OtherInstitutions::all();
        return view('admin.other_institutions_panel', ['institutions' => $institutions]);
    }

    public function updateCourse(Request $request)
    {
        return $request->all();
        $data = $this->validateCourse($request, $request->all());
        OtherInstitutionCourses::where('course_id', $request->get("course_id"))->update(['course_name'=> $request->get('name'), 'level'=> $request->get('level')]);
        return redirect()->back()->with('success_msg', 'Course Updated Successfully.');

    }

    public function validateCourse($request, $data)
    {

        return $request->validate([
            'name' => 'required',
            'course_id' => 'required'
        ], [
            'name.required' => 'Name is required'
        ]);
    }
    public  function deleteCourse($id){
        OtherInstitutionCourses::where('id', $id)->delete();
        return redirect()->back()->with('success_msg', 'Course Deleted Successfully.');
    }
    public function institutionCourses($id)
    {
        $institution = OtherInstitutions::where('institution_id', $id)->value('institution_name');
        $courses = OtherInstitutionCourses::where('institution_id', $id)->orderBy('level', 'ASC')->get();
        return view('admin.institutions_courses', ['courses'=> $courses, 'institution' => $institution, 'inst_id' => $id]);
    }
    public function updateInstitution(Request $request)
    {
        $data = $this->validateData($request, $request->all());
        OtherInstitutions::where('institution_id', $request->get("institution_id"))->update(['institution_name'=> $request->get('name')]);
        return redirect()->back()->with('success_msg',  'Institution Updated Successfully.');
    }

    public function validateData($request, $data){

        return $request->validate([
            'name' => 'required',
            'institution_id' => 'required'
        ], [
            'name.required' => 'Name is required'
        ]);
    }
    public function institution()
    {
        $institutions = OtherInstitutions::get();

        return view('admin.institution',["institutions" => $institutions]);
    }
    public function institutions()
    {
        $otherInstitutions = InstitutionType::all();
        return view('admin.institutions',['otherInstitutions' => $otherInstitutions]);
    }
    public function updateOthers(Request $request)
    {
        $institutions = InstitutionType::all();
        return view('admin.update_others')->with('institutions', $institutions);
    }
    public function createOtherInstitutionCourses(Request $request)
    {
        if ($request->get('update') == "Y"){

            $institution_type_id = Str::random(20);
            $institution_id = $request->get('id');
            $course_id = Str::random(20);

            $course_codes_explode = [];
            $course_names_explode = [];
            $level_explode = [];

            $course_codes = $request->get('courses_codes');
            $course_names = $request->get('course_names');
            $level = $request->get('level');


            for ($k=0; $k<count($course_codes); $k++){
                array_push( $course_codes_explode, explode(",", $course_codes[$k]));
                array_push($course_names_explode, explode(",", $course_names[$k]));
                array_push($level_explode, explode(",", $level[$k]));
            }


            $courses = array_map(null, $course_codes_explode, $course_names_explode,  $level_explode);

            foreach($courses as $course){
                $course_code = $course[0];
                $course_name = $course[1];
                $level = $course[2];
                for($i=0; $i<count($course_code); $i++){
                    OtherInstitutionCourses::create([
                        'institution_id' => $institution_id,
                        'course_id' => Str::random(20),
                        'course_name' => $course_name[$i],
                        'course_code' => $course_code[$i],
                        'level' => $level[$i]
                    ]);
                }
            }

            return redirect()->back()->with('success_msg', 'Institution Created Successfully.');
        }

        $institution_type_id = Str::random(20);
        $institution_id = Str::random(20);
        $course_id = Str::random(20);

        $course_codes_explode = [];
        $course_names_explode = [];
        $level_explode = [];

        $course_codes = $request->get('courses_codes');
        $course_names = $request->get('course_names');
        $level = $request->get('level');
        $name = $request->get('name');

        OtherInstitutions::create([
            'institution_type_id' => $institution_type_id,
            'institution_id' => $institution_id,
            'institution_name' => $request->get('name')
        ]);

        InstitutionType::create([
            'institution_type_id' => $institution_type_id,
            'institution_type' => $request->get('school_type')
        ]);
        FacultyLevel::create([
            'fac_id' => $institution_id,
            'level' => $request->get("noOfYears")
        ]);

        for ($k=0; $k<count($course_codes); $k++){

            array_push( $course_codes_explode, explode(",", $course_codes[$k]));
            array_push($course_names_explode, explode(",", $course_names[$k]));
            array_push($level_explode, explode(",", $level[$k]));
        }


        $courses = array_map(null, $course_codes_explode, $course_names_explode,  $level_explode);

        foreach($courses as $course){

            $course_code = $course[0];
            $course_name = $course[1];
            $level = $course[2];
            for($i=0; $i<count($course_code); $i++){
                OtherInstitutionCourses::create([
                    'institution_id' => $institution_id,
                    'course_id' => Str::random(20),
                    'course_name' => $course_name[$i],
                    'course_code' => $course_code[$i],
                    'level' => $level[$i]
                ]);
            }
        }
        return redirect()->back()->with('sucess_msg', 'Courses Created Successfully.');
    }

    public function createOthers(Request $request)
    {

        $noOfYears = $request->get('no_of_years');
        $name = $request->get('name');
        $school_type = $request->get('school_type');

        return view('admin.others_schools',
            [
                'name' => $name,
                'noOfYears' => $noOfYears,
                'school_type' => $school_type
            ]);
    }
    public function dashboard(){
        $videos = Videos::leftJoin("users", 'videos.instructor_email', '=' ,'users.email')
      ->leftJoin('topics', 'videos.topic_id', '=', 'topics.topic_id')->limit(5)
      ->orderBy("videos.created_at", 'DESC')
      ->select('users.email', 'videos.title', 'videos.vid_id', 'videos.created_at')
      ->get();
        return view('admin.dashboard')->with('videos', $videos);
    }

    public function deleteVideo($id, Request $request){
        Videos::where('id', $id)->delete();
        $finalPath = storage_path('');
        unlink($finalPath.'/'. $request->get('vid_path'));
        VideoComments::where('vid_id', $request->get('vid_id'))->delete();
        if ($request->get('status') == "S")
            SecVideoViewsLikes::where('vid_id', $request->get('vid_id'))->delete();
        elseif($request->get('status') == "U")
            VideoViewsLikes::where('vid_id', $request->get('vid_id'))->delete();
        elseif($request->get('status') == "O")
            OtherInstitutionViewsLikes::where('vid_id', $request->get('vid_id'))->delete();

            return redirect()->back()->with('msg', 'Video Deleted');
    }
    public function secVideos()
    {
        $videos =  Videos::where('status', 'S')->orderBy('created_at', 'DESC')->get();
        return view('admin.secVideos')->with('videost', $videos);
    }
    public function createSchool()
    {
        return view('admin.create_school');
    }

    public function showPassword(){
        return view('change_password');
    }

    public function getVideo(){
        $video = storage_path(\App\Videos::where('vid_id', request()->get("vid_id"))->value('vid_path'));
        $response = Response::make($video, 200);
        $response->header('Content-Type', 'video/mp4');
        return $response;
    }
    public function videos(){
        $videos =  Videos::orderBy('created_at', 'DESC')->where('status', 'U')->get();
        return view('admin.videos')->with('videost', $videos);
    }

    public function showVideo($id, Request $request){

        return view('admin.video', ['vid_id' => $id, 'options' => 'uni']);
    }

    public function updatePassword(Request $request){
        $db_pass =  Auth::user()->password;
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',

        ],[
            'old_password.required' => 'Old Password is required',
            'confirm_password.required' => 'Confirm Password is required',
            'new_password.required' => 'New Password is required',
            'new_password.min' => 'Password must be more than 6 Characters',
        ]);

        if(Hash::check($request->get('old_password'), $db_pass)){
             $email = Auth::user()->email;
              User::where('email', $email)->update(['password' => Hash::make($request->get('new_password'))]);
                return redirect()->back()->with('sucess_msg', 'Password Updated Successfully');
        }else{
            return redirect()->back()->with('err_msg', 'Password Does not match our record');
        }
    }

    public function blockUsers(Request $request, $user_id){
        $user = User::where('username', $user_id)->update(['blocked' => 'Y']);
        if ($user) {
            return response()->json('blocked', 200);
        }

    }

    public function unBlockUsers(Request $request, $user_id){
        $user = User::where('username', $user_id)->update(['blocked' => 'N']);
        if ($user) {
            return response()->json('unblocked', 200);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('user/admin');

    }
}
