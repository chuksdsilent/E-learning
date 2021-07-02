<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\Departments;
use App\FacultyLevel;
use App\Universities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fac_id)
    {

        $faculties = Faculties::all(['uni_id', 'name', 'fac_id']);
        $universites = Universities::all(['uni_id', 'name']);
        $departments = Departments::where('fac_id', $fac_id)->where('uni_id', Faculties::where('fac_id', $fac_id)->value('uni_id'))->paginate(15);
        return view('admin.departments')->with('departments', $departments)->with('universities', $universites)->with('faculties', $faculties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->request->add(['dept_id' => Str::random(20)]);
        $this->valideData($request);

        $array_name = [];
        $array_name = explode(",",$request->get('name'));

        for ($i=0; $i < count($array_name); $i++){
            Departments::create([
                'name' => $array_name[$i],
                'uni_id' => $request->get('uni_id'),
                'dept_id' =>  Str::random(20),
                'fac_id' => $request->get('fac_id')
            ]);
        }

        if (!FacultyLevel::where('fac_id', $request->get('fac_id'))->exists()){
            FacultyLevel::create([
                'fac_id' => $request->get('fac_id'),
                'level' => $request->get('level')
            ]);
        }

        return redirect()->back()->with('sucess_msg', 'Department Created Successfully.');
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
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $departments, $dept_id)
    {
        Departments::where('dept_id', $dept_id)->update($this->valideData($request));
        return redirect()->back()->with('sucess_msg', 'Department Created Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $departments, $dept_id)
    {
        Departments::where('dept_id', $dept_id)->delete();
        return redirect()->back()->with('error_msg', 'Department deleted Successfully.');
    }

    public function valideData($request){

        return   $request->validate([
            'name' => 'required',
            'uni_id' => 'required',
            'fac_id' => 'required',
        ], [
            'name.required' => 'Department Name is required',
            'uni_id.required' => 'University Name is required',
            'fac_id.required' => 'Faculty Name is required',
        ]);

    }
    public function getFaculties(Request $request, $uni_id){
        $authorizaion = $request->header('authorization');
        $faculties = Faculties::where('uni_id', $uni_id)->get(['uni_id', 'name', 'fac_id']);
         return response()->json($faculties, 200);
    }
}
