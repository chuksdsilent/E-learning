<?php

namespace App\Http\Controllers;

use App\Subjects;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::all();
        return view('admin.subjects')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->request->add(['sub_id' => Str::random(20)]);
         Subjects::create($this->validateData($request));
        return redirect()->back()->with('sucess_msg', 'Subject Created Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function edit(Subjects $subjects)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subjects $subjects, $sub_id)
    {

        Subjects::where('sub_id', $sub_id)->update($this->validateData($request));
        return redirect()->back()->with('sucess_msg', 'Subject Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subjects $subjects, $sub_id)
    {
        Subjects::where('sub_id', $sub_id)->delete();
        return redirect()->back()->with('error_msg', 'Subject Deleted Successfully.');

    }


    public function validateData($request){

        return $request->validate([
             'name' => 'required',
             'sub_id' => 'required:unique:subjects'
         ], [
             'name.required' => 'Subject Name is required',
             'sub_id.unique' => 'Must be Unique'
         ]);
     }
}
