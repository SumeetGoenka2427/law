<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    public function index()
    {
        return view('pages.articles');
    }

    public function show($id)
    {
        return view('pages.article-detail', compact('id'));
    }
}
