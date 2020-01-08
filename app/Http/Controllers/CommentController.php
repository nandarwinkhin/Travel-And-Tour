<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\requests\CommentFormRequest;

class CommentController extends Controller
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

    public function showComment($commented_on,$commentable_id){
        $comments=Comment::where('commented_on','=',$commented_on)
                            ->where('commentable_id','=',$commentable_id)
                            ->get();
        return view('comment')->with('comments',$comments);
    }

    public function storeComment($commented_on,$commentable_id,CommentFormRequest $request){
        Comment::create([
            'user_id'=>\Auth::user()->id,
            'description'=>$request->description,
            'commented_on'=>$commented_on,
            'commentable_id'=>$commentable_id,
        ]);
        return redirect('comments/'.$commented_on.'/'.$commentable_id);
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
    public function createComment(Request $request){
        $comment = Comment::create($request->all());
        return response()->json($comment);
    }

    public function selectComment(){
        $comments  = Comment::all()->sortBy('created_at');
        $response["comments"] = $comments;
        return response()->json($response);
    }

    public function updateComment(Request $request, $id){
        $comment  = Comment::where('id',$id)->get();
           $comment->user_id = $request->input('user_id');
           $comment->description = $request->input('description');
           $comment->commented_on = $request->input('commented_on');
           $comment->commentable_id = $request->input('commentable_id');
           $comment->save();
           $response["comment"] = $comment;
        return response()->json($response);
    }  

    public function deleteComment($id){
        $comment=Comment::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }
}
