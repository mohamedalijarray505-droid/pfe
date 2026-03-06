<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
         $categories = Category::with(['videos' => function ($query) {
            $query->where('is_active', true)
                  ->with(['reactions', 'comments'])
                  ->latest()
                  ->take(3);
        }])->get();

        return view('home', compact('categories'));
    }
}
