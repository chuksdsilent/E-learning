<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\FacultyLevel;
use App\Universities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uni_id)
    {
        $faculties = Faculties::where('uni_id', $uni_id)->get();
        $universities = Universities::all();

        return view('admin.faculties')->with('faculties', $faculties)->with('universities', $universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fac_id =  Str::random(20);
        $array_name = [];
        $array_name = explode(",",  $request->get('name'));

        for ($i=0; $i < count($array_name); $i++){
            Faculties::create([
                'name' => $array_name[$i],
                'uni_id' => $request->get('uni_id'),
                'fac_id' => $fac_id
            ]);
        }

//        $request->request->add(['fac_id' => Str::random(20)]);

//        Faculties::create($this->validateData($request));
        return redirect()->back()->with('sucess_msg', 'Faculty Created Successfully.');
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
     * @param  \App\Faculties  $faculties
     * @return \Illuminate\Http\Response
     */
    public function show(Faculties $faculties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculties  $faculties
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculties $faculties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculties  $faculties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculties $faculties, $fac_id)
    {
        Faculties::where('fac_id', $fac_id)->update($this->validateData($request));
        return redirect()->back()->with('sucess_msg', 'Faculty Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculties  $faculties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculties $faculties, $fac_id)
    {
        $fac = Faculties::where('fac_id', $fac_id)->value('name');
        Faculties::where('fac_id', $fac_id)->delete();
        return redirect()->back()->with('error_msg',  $fac. ' Deleted Successfully.');
    }

    public function validateData($request){

       return $request->validate([
            'name' => 'required',
            'uni_id' => 'required'
        ], [
            'name.required' => 'Faculty Name is required'
        ]);
    }
}
