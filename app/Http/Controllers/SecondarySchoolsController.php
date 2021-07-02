<?php

namespace App\Http\Controllers;

use App\SecondarySchools;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SecondarySchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.secondary_schools');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->request->add(['school_id' => Str::random(20)]);     
        $request->validate([
            'name' => 'required',
            'school_id' => 'required|unique:secondary_schools'
        ], [
            'name.required' => 'Name is required',
            'uni_id.unique' => 'The id must be unique. Please retry'
        ]);
        SecondarySchools::create($request->all());
        return redirect()->back()->with('sucess_msg', 'Secondary School Created Successfully.');
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
     * @param  \App\SecondarySchools  $secondarySchools
     * @return \Illuminate\Http\Response
     */
    public function show(SecondarySchools $secondarySchools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SecondarySchools  $secondarySchools
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondarySchools $secondarySchools)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SecondarySchools  $secondarySchools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondarySchools $secondarySchools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SecondarySchools  $secondarySchools
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondarySchools $secondarySchools)
    {
        //
    }
}
