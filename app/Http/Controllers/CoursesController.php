<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Faculties;
use App\Departments;
use App\Universities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getInstructorDepartments(){

        $fac_id = $_GET['fac_id'];
        $fac_id = str_replace(' ', '',  $fac_id);
        $departments = Departments::where('fac_id', $fac_id)->get(['dept_id', 'name', 'fac_id']);
         return response()->json($departments, 200);

   }

    public function index($dept_id)
    {
        $universites = Universities::all(['uni_id', 'name']);
        $faculties = Faculties::all(['name', 'fac_id']);
        $departments = Departments::all(['uni_id', 'name']);
        $courses = Courses::where('dept_id', $dept_id)->get();
        return view('admin.courses')
            ->with('courses', $courses)
            ->with('universities', $universites)
            ->with('faculies', $faculties)
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validateData($request);
        $array_name = [];
        $array_course_code = [];
        $array_course_code = explode(",", $request->get('course_code'));
         $array_name = explode(",",$request->get('name'));
        if ( count($array_course_code) == count($array_name)){
            for ($i=0; $i < count($array_name); $i++){
                Courses::create([
                    'name' => $array_name[$i],
                    'uni_id' => $request->get('uni_id'),
                    'dept_id' =>  $request->get('dept_id'),
                    'course_id' =>  Str::random(20),
                    'fac_id' => $request->get('fac_id'),
                    'level' => $request->get('level'),
                    'course_code' => $array_course_code[$i]
                ]);
            }
        }else{
            return  0;
            return redirect()->back()->with('sucess_msg', 'Course Code and Course Name must be the same length.');
        }
        return redirect()->back()->with('sucess_msg', 'Course Created Successfully.');


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
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses, $course_id)
    {

//        $data = $this->validateData($request->except("_token", "_method"));

        Courses::where('id', $request->get('id'))->update($request->except("_token", "_method"));
        return redirect()->back()->with('sucess_msg', 'Course Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses, $course_id)
    {
        Courses::where('course_id', $course_id)->delete();
        return redirect()->back()->with('error_msg', 'Course Deleted Successfully.');

    }


    public function validateData($request){

        return $request->validate([
             'name' => 'required',
             'uni_id' => 'required',
             'fac_id' => 'required',
             'dept_id' => 'required',
             'course_code' => 'required',
             'level' => 'required'
         ], [
             'name.required' => 'Course Name is required',
             'uni_id.required' => 'University Name is required',
             'fac_id.required' => 'Faculty Name is required',
            'dept_id.required' => 'Department Name is required',
            'level.required' => 'Level Name is required',
         ]);
     }


    public function getDepartments(Request $request){

            $fac_id = $_GET['fac_id'];
            $departments = Departments::where('fac_id', $fac_id)->get(['dept_id', 'name', 'fac_id']);
             return response()->json($departments, 200);

    }

    public function getCourses(Request $request){

            $dept_id = $_GET['dept_id'];
            $courses = Courses::where('dept_id', $dept_id)->get(['course_id', 'dept_id', 'name',  'course_code', 'fac_id']);
             return response()->json($courses, 200);
    }
}
