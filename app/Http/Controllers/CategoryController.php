<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
   public function show(Category $category)
{
    $category->load([
        'videos' => function ($q) {
            $q->where('is_active', true)
              ->with(['reactions', 'comments'])
              ->latest()
              ->paginate(12);
        }
    ]);
    

    return view('categories.show', compact('category'));
}
}