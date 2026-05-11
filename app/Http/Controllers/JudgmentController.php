<?php

namespace App\Http\Controllers;

use App\Models\Judgment;
use App\Models\Category;

class JudgmentController extends Controller
{
    public function index()
    {
        $judgments  = Judgment::with('category')->published()->latest('published_at')->paginate(12);
        $categories = Category::orderBy('name')->get();
        return view('pages.judgments', compact('judgments', 'categories'));
    }

    public function show(string $slug)
    {
        $judgment = Judgment::with('category')->published()->where('slug', $slug)->firstOrFail();
        $judgment->increment('views');
        $related  = Judgment::published()
                    ->where('id', '!=', $judgment->id)
                    ->where('court', $judgment->court)
                    ->latest('published_at')->limit(4)->get();
        return view('pages.judgment-detail', compact('judgment', 'related'));
    }
}
