<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function charter()
    {
        return view('pages.charter');
    }

    public function editorialLine()
    {
        return view('pages.editorial-line');
    }

    public function internalRegulations()
    {
        return view('pages.internal-regulations');
    }

    public function about()
    {
        return view('pages.about');
    }
}
