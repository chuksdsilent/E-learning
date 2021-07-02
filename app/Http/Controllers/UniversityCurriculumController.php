<?php

namespace App\Http\Controllers;

use App\UniversityCurriculum;
use Illuminate\Http\Request;

class UniversityCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.curriculum_for_university');
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
     * @param  \App\UniversityCurriculum  $universityCurriculum
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityCurriculum $universityCurriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UniversityCurriculum  $universityCurriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityCurriculum $universityCurriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UniversityCurriculum  $universityCurriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityCurriculum $universityCurriculum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UniversityCurriculum  $universityCurriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityCurriculum $universityCurriculum)
    {
        //
    }
}
