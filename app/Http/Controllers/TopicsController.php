<?php

namespace App\Http\Controllers;

use App\Topics;
use App\Courses;
use App\Faculties;
use App\Departments;
use App\Universities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function create(Request $request){

        $this->validateData($request);
        $array_name = [];
        $array_name = explode(',', $request->get('name'));
//
        for ($i=0; $i < count($array_name); $i++){
            Topics::create([
                'name' => $array_name[$i],
                'uni_id' => $request->get('uni_id'),
                'dept_id' =>  $request->get('dept_id'),
                'course_id' =>  $request->get('course_id'),
                'fac_id' => $request->get('fac_id'),
                'topic_id' => Str::random(20)
            ]);
        }
        return redirect()->back()->with('sucess_msg', 'Topic Created Successfully.');

        // return view('admin.topics');
    }

    public function index($course_id){
         $courses = Courses::all();

        $universites = Universities::all(['uni_id', 'name']);
        $faculties = Faculties::all(['name', 'fac_id']);
        $departments = Departments::all(['uni_id', 'name']);
        $topics = Topics::where('course_id', $course_id)->get();
        return view('admin.topics')
        ->with('topics', $topics)
        ->with('courses', $courses)
        ->with('universities', $universites)
        ->with('faculies', $faculties)
        ->with('departments', $departments);
    }

    public function validateData($request){

        return $request->validate([
             'name' => 'required',
             'uni_id' => 'required',
             'fac_id' => 'required',
             'dept_id' => 'required',
             'course_id' => 'required'
         ], [
             'name.required' => 'Course Name is required',
             'uni_id.required' => 'University Name is required',
             'fac_id.required' => 'Faculty Name is required',
             'dept_id.required' => 'Department Name is required',
             'course_id.required' => 'Course Name is required'
         ]);
     }

     public function getTopics(Request $request){

        $authorizaion = $request->header('authorization');

        if (!empty(Auth::user()->token) && $authorizaion == Auth::user()->token) {
            $fac_id = $_GET['fac_id'];
            $uni_id = $_GET['uni_id'];
            $course_id = $_GET['course_id'];
            $dept_id = $_GET['dept_id'];
            $topics = Topics::where('fac_id', $fac_id)->where('uni_id', $uni_id)->where('course_id', $course_id)->where('dept_id', $dept_id)->get(['topic_id', 'name']);
             return response()->json($topics, 200);
        }else {
            return response()->json(['unauthorized' => "Unauthorized Access"], 401);

        }
     }

}
