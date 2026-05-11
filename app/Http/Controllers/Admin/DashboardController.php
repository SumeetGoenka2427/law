<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Judgment;
use App\Models\Interview;
use App\Models\LatestNews;
use App\Models\Opinion;
use App\Models\Author;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles'   => Article::count(),
            'judgments'  => Judgment::count(),
            'interviews' => Interview::count(),
            'news'       => LatestNews::count(),
            'opinions'   => Opinion::count(),
            'authors'    => Author::count(),
            'categories' => Category::count(),
            'published'  => Article::where('status', 'published')->count()
                          + Judgment::where('status', 'published')->count()
                          + Interview::where('status', 'published')->count()
                          + LatestNews::where('status', 'published')->count(),
        ];

        $recentArticles  = Article::with('author')->latest()->limit(5)->get();
        $recentJudgments = Judgment::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentJudgments'));
    }
}
