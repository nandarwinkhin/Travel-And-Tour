<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserLoginController;
use Illuminate\Http\Request;
use App\Http\requests\CreatePostFormRequest;
use App\Post;
use App\User;
use App\Http\Controllers\Auth;

class CreatePostController extends UserLoginController
{
    public function imagesUpload()

    {

        return view('create_post');

    }

    public function createPost(CreatePostFormRequest $request){
        $files=$request->file('ImageForPost');
        $fileAry=array();
        
            foreach($files as $file){
                $filename=uniqid().'_'.$file->getClientOriginalName();
                array_push($fileAry,$filename);
                $file->move(public_path().'/uploades/',$filename);
                
            }
        Post::create([
            'user_id'=>\Auth::user()->id,
            'description'=>$request->description,
            'photo'=>serialize($fileAry),
        ]);
        
        return redirect('/welcome');
    }

    // public function imagesUploadPost(Request $request)
    // {

    //     request()->validate([

    //         'uploadFile' => 'required',

    //     ]);

    //     foreach ($request->file('uploadFile') as $key => $value) {

    //         $imageName = time(). $key . '.' . $value->getClientOriginalExtension();

    //         $value->move(public_path('images'), $imageName);

    //     }

    //     return response()->json(['success'=>'Images Uploaded Successfully.']);

    // }

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
