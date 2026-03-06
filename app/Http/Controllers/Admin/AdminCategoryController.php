<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255'
    ]);

    Category::create([
        'name' => $request->name
    ]);

    return back()->with('success', 'Catégorie ajoutée');
    }
    
    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès.');
}


}