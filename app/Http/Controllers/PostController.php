<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
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
    public function createPost(Request $request){
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function selectPost(){
        $posts  = Post::all()->sortBy('created_at');
        $response["posts"] = $posts;
        return response()->json($response);
    }

    public function updatePost(Request $request, $id){
        $post  = Post::where('id',$id)->get();
           $post->user_id = $request->input('user_id');
           $post->description = $request->input('description');
           $post->photo = $request->input('photo');
           $post->save();
           $response["posts"] = $post;
        return response()->json($response);
    }  

    public function deletePost($id){
        $post=Post::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }
}
