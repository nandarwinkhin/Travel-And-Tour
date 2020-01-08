<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripPlan;

class TripPlanController extends Controller
{
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

    //API
    public function createTripPlan(Request $request){
        $tripPlan = TripPlan::create($request->all());
        return response()->json($tripPlan);
    }

    public function selectTripPlan(){
        $tripPlans = TripPlan::all()->sortBy('created_at');
        $response["tripPlans"] = $tripPlans;
        return response()->json($response);
    }

    public function updateTripPlan(Request $request, $id){
        $tripPlan  = TripPlan::where('id',$id)->get();
           $tripPlan->trip_title = $request->input('trip_title');
           $tripPlan->user_id = $request->input('user_id');
           $tripPlan->cost = $request->input('cost');
           $tripPlan->description = $request->input('description');
           $tripPlan->photo = $request->input('photo');
           $tripPlan->created_at = $request->input('created_at');
           $tripPlan->updated_at = $request->input('updated_at');
           $tripPlan->save();
           $response["tripPlans"] = $tripPlan;
        return response()->json($response);
    }  

    public function deleteTripPlan($id){
        $tripPlan=TripPlan::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }
}
