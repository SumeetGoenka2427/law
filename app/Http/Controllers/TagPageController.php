<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagPageController extends Controller
{
    public function show(string $slug)
    {
        $tag      = Tag::where('slug', $slug)->firstOrFail();
        $articles = $tag->articles()
                        ->with(['author', 'category'])
                        ->published()
                        ->latest('published_at')
                        ->paginate(12);

        return view('pages.tag', compact('tag', 'articles'));
    }
}
