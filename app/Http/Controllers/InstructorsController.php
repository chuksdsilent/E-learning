<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Departments;
use App\OtherInstitutionCourses;
use App\OtherInstitutions;
use App\OtherInstitutionVideos;
use App\OtherSchools;
use App\SecVideos;
use App\Subjects;
use App\Videos;
use App\Faculties;
use App\Instructors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadVideo()
    {

        $depts = Departments::all();
        $courses = Courses::all();
        $otherInstitutions = OtherInstitutions::all();
        $subjects = Subjects::all();
        return view('instructor.video.create', ['otherInstitutions' => $otherInstitutions])->with('courses', $courses)->with('depts', $depts)->with('subjects', $subjects);
    }
    public function index()
    {
        $instructors = Instructors::all();
        return view('admin.instructors')->with('instructors', $instructors);
    }

    public function uploadSecVidoes()
    {
        $subjects = Subjects::all();

        return view('instructor.uploadSecVideo')->with('subjects', $subjects);
    }
    public function dashboard(){
        $videos = Videos::where("instructor_email", Auth::user()->email)->limit(10)->orderBy('created_at', 'DESC')->get();
        return view('instructor.dashboard')
            ->with('videos', $videos);
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

    public function secVideos()
    {

        $videos = Videos::where('instructor_email', Auth::user()->email)->where('status', 'S')->orderBy('created_at', 'DESC')->get();
        return view('instructor.secVideos')->with('videost', $videos);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function showPassword(){
        return view('change_password');
    }

    public function profileUpdated(){
        return view('profile_update');
    }

    public function profile(){
        return view('profile');
    }

    public function updatePics(){

    return view('inner_profile_pics');
    }
    public function updateInfo(){
        $faculties = Faculties::all();
        $user = Instructors::where('email', Auth::user()->email)->get();
        return view('info')->with('faculties', $faculties)->with('user', $user);

    }

    public function updateInstructorInfo(Request $request){
        $request->validate(
             [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'phone' => 'required',
                'dept_id' => 'required',
                'display_name' => 'required'
            ]);

        try {

            Instructors::where('email', Auth::user()->email)->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'phone' => $request->get('phone'),
                'dept_id' => $request->get('dept_id'),
                'display_name' => $request->get('display_name'),
            ]);

        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        return response()->json($request->all());
    }
}
