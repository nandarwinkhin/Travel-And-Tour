<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewsController extends Controller
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
    public function createReview(Request $request){
        $review = Review::create($request->all());
        return response()->json($post);
    }

    public function selectReview(){
        $reviews  = Review::all()->sortBy('created_at');
        $response["reviews"] = $reviews;
        return response()->json($response);
    }

    public function updateReview(Request $request, $id){
        $review  = Review::where('id',$id)->get();
           $review->user_id = $request->input('user_id');
           $review->description = $request->input('description');
           $review->reviewed_on = $request->input('reviewed_on');
           $review->rating = $request->input('rating');
           $review->save();
           $response["review"] = $review;
        return response()->json($response);
    }  

    public function deleteReview($id){
        $review=Review::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }
}
