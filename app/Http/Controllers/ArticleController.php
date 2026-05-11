<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles   = Article::with(['category', 'author'])->published()->latest('published_at')->paginate(12);
        $categories = Category::orderBy('name')->get();
        return view('pages.articles', compact('articles', 'categories'));
    }

    public function show(string $slug)
    {
        $article = Article::with(['category', 'author', 'tags'])->published()->where('slug', $slug)->firstOrFail();
        $article->increment('views');
        $related = Article::with(['category', 'author'])->published()
                    ->where('id', '!=', $article->id)
                    ->where('category_id', $article->category_id)
                    ->latest('published_at')->limit(4)->get();
        return view('pages.article-detail', compact('article', 'related'));
    }
}
