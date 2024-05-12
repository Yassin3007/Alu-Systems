<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::where('is_accepted',0)->get();
        
        return view('admin.comments.index',compact('comments'));
    }

    /**
      Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'comment'=>'required',
       ]);
       Comment::create([
        'name'=>$request->name ,
        'email'=>$request->email ,
        'comment'=>$request->comment,
        'article_id'=>$request->article_id 
       ]);
       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return back();
    }
    public function accept_comment($id){

        $comment = Comment::where('id',$id)->update([
            'is_accepted'=>1
        ]);
        return back();
    }
}
