<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $videosCount = Video::count();
        $categoriesCount = Category::count();
        // Dernier commentaire pour dashboard
        $lastComment = Comment::with(['user', 'video'])
            ->latest()
            ->first();
        // Notifications admin
        $notifications = Auth::user()->notifications()->latest()->take(5)->get();
        return view('admin.dashboard', compact(
            'usersCount',
            'videosCount',
            'categoriesCount',
            'lastComment',
            'notifications',
        ));
    }

    // Page pour tous les commentaires
    public function commentsIndex()
    {
        $comments = Comment::with(['user', 'video'])
            ->latest()
            ->paginate(20);
        return view('admin.comments.index', compact('comments'));
    }
}
