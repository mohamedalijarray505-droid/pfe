<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;


class ReactionController extends Controller
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
    public function store(Request $request, Video $video)
    {
       $request->validate([
        'reaction' => 'required|string',
    ]);

    // Vérifie que l'utilisateur est connecté
    $userId = Auth::id();
    if (!$userId) {
        return redirect()->back()->with('error', 'Vous devez être connecté pour réagir.');
    }

    // Cherche si l'utilisateur a déjà réagi sur cette vidéo
    $existing = Reaction::where('video_id', $video->id)
                        ->where('user_id', $userId)
                        ->first();

    if ($existing) {
        if ($existing->reaction === $request->reaction) {
            // Même réaction → toggle = supprimer
            $existing->delete();
        } else {
            // Autre réaction → mise à jour
            $existing->reaction = $request->reaction;
            $existing->save();
        }
    } else {
    Reaction::create([
        'video_id'  => $video->id,
        'reaction'  => $request->reaction,
        'user_id'   => Auth::id(), // null si visiteur
        'session_id'=> session()->getId(),
        'ip_address'=> $request->ip(),
    ]);
    }
    return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Reaction $reaction)
    {
        $video->increment('likes');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
}
