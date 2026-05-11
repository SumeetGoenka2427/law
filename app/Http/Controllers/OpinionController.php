<?php

namespace App\Http\Controllers;

use App\Models\Opinion;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::with('author')->published()->latest('published_at')->paginate(12);
        return view('pages.opinions', compact('opinions'));
    }

    public function show(string $slug)
    {
        $opinion = Opinion::with('author')->published()->where('slug', $slug)->firstOrFail();
        $opinion->increment('views');
        $related = Opinion::with('author')->published()
                    ->where('id', '!=', $opinion->id)
                    ->latest('published_at')->limit(3)->get();
        return view('pages.opinion-detail', compact('opinion', 'related'));
    }
}
