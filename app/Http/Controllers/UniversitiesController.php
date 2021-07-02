<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\Universities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fac = Faculties::all();
         $universities = Universities::all();
        return view('admin.universities')->with('universities', $universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->request->add(['uni_id' => Str::random(20)]);
        Universities::create($request->all());
        return redirect()->back()->with('sucess_msg', 'University Created Successfully.');
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
     * @param  \App\Universities  $universities
     * @return \Illuminate\Http\Response
     */
    public function show(Universities $universities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Universities  $universities
     * @return \Illuminate\Http\Response
     */
    public function edit(Universities $universities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Universities  $universities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Universities $universities)
    {
       $data = $this->validateData($request, $request->all());
        Universities::where('uni_id', $request->get('uni_id'))->update($data);
        return redirect()->back()->with('sucess_msg', 'University Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Universities  $universities
     * @return \Illuminate\Http\Response
     */
    public function destroy($uni_id)
    {
        Universities::where('uni_id', $uni_id)->delete();
        $universities = Universities::all();

        return redirect()->back()->with('sucess_msg', 'University Deleted Successfully.')->with('universities', $universities);

    }

    public function validateData($request, $data){

       return $request->validate([
            'name' => 'required',
            'uni_id' => 'required'
            ], [
                'name.required' => 'Name is required'
            ]);
    }

}
