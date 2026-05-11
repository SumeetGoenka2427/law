<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Article;
use App\Models\Interview;
use App\Models\Opinion;

class AuthorPageController extends Controller
{
    public function show(string $slug)
    {
        $author = Author::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $articles = Article::with('category')
                        ->published()
                        ->where('author_id', $author->id)
                        ->latest('published_at')
                        ->paginate(8, ['*'], 'articles_page');

        $interviews = Interview::published()
                        ->where('author_id', $author->id)
                        ->latest('published_at')
                        ->limit(5)->get();

        $opinions = Opinion::published()
                        ->where('author_id', $author->id)
                        ->latest('published_at')
                        ->limit(5)->get();

        return view('pages.author', compact('author', 'articles', 'interviews', 'opinions'));
    }
}
