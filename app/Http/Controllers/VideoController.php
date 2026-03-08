<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.videos.index', [
            'videos' => Video::with('reactions')->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
   public function show(Video $video)
{
    // Incrémenter les vues
    $video->increment('views');

    // Charger les relations
    $video->load(['reactions', 'comments']);
$comments = $video->comments()
    ->where('status', 'approved')
    ->with('user')
    ->latest()
    ->get();


    return view('videos.show', compact('video' , 'comments'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
