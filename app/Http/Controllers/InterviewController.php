<?php

namespace App\Http\Controllers;

use App\Models\Interview;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::with('author')->published()->latest('published_at')->paginate(12);
        return view('pages.interviews', compact('interviews'));
    }

    public function show(string $slug)
    {
        $interview = Interview::with('author')->published()->where('slug', $slug)->firstOrFail();
        $interview->increment('views');
        return view('pages.interview-detail', compact('interview'));
    }
}
