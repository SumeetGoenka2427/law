<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use App\Models\Judgment;
use App\Models\Opinion;
use App\Models\Article;
use App\Models\Advertisement;

class HomeController extends Controller
{
    public function index()
    {
        $heroArticles   = Article::with(['category', 'author'])->published()->featured()->latest('published_at')->limit(4)->get();
        $latestNews     = LatestNews::with(['category', 'author'])->published()->latest('published_at')->limit(6)->get();
        $breakingNews   = LatestNews::published()->breaking()->latest('published_at')->limit(8)->get();
        $judgments      = Judgment::with('category')->published()->latest('published_at')->limit(4)->get();
        $opinions       = Opinion::with('author')->published()->latest('published_at')->limit(3)->get();
        $leaderboardAd  = Advertisement::active()->where('position', 'leaderboard')->first();
        $sidebarTopAd   = Advertisement::active()->where('position', 'sidebar-top')->first();
        $sidebarMidAd   = Advertisement::active()->where('position', 'sidebar-mid')->first();

        return view('pages.home', compact(
            'heroArticles', 'latestNews', 'breakingNews', 'judgments', 'opinions',
            'leaderboardAd', 'sidebarTopAd', 'sidebarMidAd'
        ));
    }
}
