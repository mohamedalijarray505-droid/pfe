<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'content' => 'required|string|max:500',
        'video_id' => 'required',
    ]);

    Comment::create([
        'video_id' => $request->video_id,
        'content'   => $request->content,
        'user_id'   => Auth::id(),
        'session_id'=> session()->getId(),
        'ip_address'=> $request->ip(),
         'status' => 'pending'
    ]);

     return back()->with('success','Commentaire envoyé pour validation');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $video->increment('comments');

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
    public function destroy(Comment $comment)
    {
        //
    }
}
