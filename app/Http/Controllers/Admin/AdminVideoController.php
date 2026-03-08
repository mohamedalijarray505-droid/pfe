<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;
use App\Models\Reaction;
use App\Models\Category;


class AdminVideoController extends Controller
{
   public function index()
{
   $videos = Video::withCount([
        'reactions as likes_count' => function ($q) {
            $q->where('reaction', 'like');
        },
        'reactions as love_count' => function ($q) {
            $q->where('reaction', 'love');
        },
        'reactions as sad_count' => function ($q) {
            $q->where('reaction', 'sad');
        },
        'reactions as angry_count' => function ($q) {
            $q->where('reaction', 'angry');
        },
        'reactions as support_count' => function ($q) {
            $q->where('reaction', 'support');
        },
    ])->get();

    return view('admin.videos.index', compact('videos'));
}

  public function create()
    {
      $categories = Category::all(); 

    return view('admin.videos.create', compact('categories'));
    }
  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'video_url' => 'required|url',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    Video::create([
        'title' => $request->title,
        'description' => $request->description,
        'video_url' => $request->video_url,
        'category_id' => $request->category_id,
        'is_active' => false,
        'views' => 0,
    ]);

    return redirect()
        ->route('admin.videos.index')
        ->with('success', 'Vidéo ajoutée avec succès');
}
public function toggle(Video $video)
{
     $video->is_active = ! $video->is_active;
    $video->save();

    return back()->with('success', 'Statut de la vidéo mis à jour');
}

public function stats(Video $video)
{
    return response()->json([
        'like'    => $video->reactions()->where('reaction', 'like')->count(),
        'love'    => $video->reactions()->where('reaction', 'love')->count(),
        'sad'     => $video->reactions()->where('reaction', 'sad')->count(),
        'angry'   => $video->reactions()->where('reaction', 'angry')->count(),
        'support' => $video->reactions()->where('reaction', 'support')->count(),
    ]);
}
}    