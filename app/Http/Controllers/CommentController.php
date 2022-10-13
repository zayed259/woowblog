<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->get();

        return view('comment.index', compact('comments'))->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'blog_id' => $request->blog_id,
            'body' => $request->body,
        ];

        Comment::create($data);
        

        return back()->with('message','Comment Create Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function hideShow($id)
    {
        $comment = Comment::find($id);
        if(Auth::user()->role == '2'){
            if($comment->ishide == 1){
                $comment->ishide = '0';
                $comment->save();
                return back()->with('message','Comment Hide Successfully!!!');
            }
            if($comment->ishide == 0){
                $comment->ishide = 1;
                $comment->save();
                return back()->with('message','Comment Show Successfully!!!');
            }
        }else{
            return back()->with('message','You are not authorized to hide/show this blog!!!');
        }
    }
    

}
