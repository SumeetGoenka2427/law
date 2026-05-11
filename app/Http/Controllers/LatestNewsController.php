<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use App\Models\Category;

class LatestNewsController extends Controller
{
    public function index()
    {
        $news       = LatestNews::with(['category', 'author'])->published()->latest('published_at')->paginate(12);
        $categories = Category::orderBy('name')->get();
        return view('pages.latest-news', compact('news', 'categories'));
    }

    public function show(string $slug)
    {
        $item    = LatestNews::with(['category', 'author'])->published()->where('slug', $slug)->firstOrFail();
        $item->increment('views');
        $related = LatestNews::with('category')->published()
                    ->where('id', '!=', $item->id)
                    ->where('category_id', $item->category_id)
                    ->latest('published_at')->limit(4)->get();
        return view('pages.news-detail', compact('item', 'related'));
    }
}
