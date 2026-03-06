<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use App\Models\Comment;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $videosCount = Video::count();
        $categoriesCount = Category::count();
       $comments = Comment::with(['user', 'video'])
        ->latest()
        ->paginate(20);
        return view('admin.dashboard', compact(
            'usersCount',
            'videosCount',
            'categoriesCount',
            'comments',
        ));
    }
}
