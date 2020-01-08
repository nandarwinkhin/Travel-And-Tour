<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripPlan;
use App\Http\requests\CreateTripPlanFormRequest;

class CreateTripPlanController extends Controller
{
    public function imagesUpload()

    {

        return view('create_trip_plan');

    }

    public function createTripPlan(CreateTripPlanFormRequest $request){
        $files=$request->file('ImageForTrip');
        $fileAry=array();
        
            foreach($files as $file){
                $filename=uniqid().'_'.$file->getClientOriginalName();
                array_push($fileAry,$filename);
                $file->move(public_path().'/uploades/',$filename);
                
            }
        TripPlan::create([
            'trip_title'=>$request->trip_title,
            'user_id'=>\Auth::user()->id,
            'cost'=>$request->cost,
            'description'=>$request->description,
            'photo'=>serialize($fileAry),
            'trip_start_date'=>$request->trip_start_date,
        ]);
        
        return redirect('/welcome');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
