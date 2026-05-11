<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Judgment;
use App\Models\LatestNews;

class CategoryPageController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles  = Article::with(['author', 'category'])
                        ->published()
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->paginate(10, ['*'], 'articles_page');

        $judgments = Judgment::with('category')
                        ->published()
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->limit(6)->get();

        $news      = LatestNews::with(['author', 'category'])
                        ->published()
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->limit(6)->get();

        return view('pages.category', compact('category', 'articles', 'judgments', 'news'));
    }
}
