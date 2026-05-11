<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Judgment;
use App\Models\Interview;
use App\Models\Opinion;
use App\Models\LatestNews;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        if (strlen($q) < 2) {
            return view('pages.search', ['q' => $q, 'results' => collect(), 'total' => 0]);
        }

        $like = '%' . $q . '%';

        $articles = Article::with(['author', 'category'])
            ->published()
            ->where(fn($query) => $query->where('title', 'like', $like)->orWhere('content', 'like', $like)->orWhere('excerpt', 'like', $like))
            ->latest('published_at')->limit(5)->get()
            ->map(fn($item) => $this->format($item, 'Article', route('articles.show', $item->slug)));

        $judgments = Judgment::with('category')
            ->published()
            ->where(fn($query) => $query->where('title', 'like', $like)->orWhere('content', 'like', $like)->orWhere('case_number', 'like', $like))
            ->latest('published_at')->limit(5)->get()
            ->map(fn($item) => $this->format($item, 'Judgment', route('judgments.show', $item->slug)));

        $interviews = Interview::with('author')
            ->published()
            ->where(fn($query) => $query->where('title', 'like', $like)->orWhere('content', 'like', $like)->orWhere('interviewee_name', 'like', $like))
            ->latest('published_at')->limit(5)->get()
            ->map(fn($item) => $this->format($item, 'Interview', route('interviews.show', $item->slug)));

        $opinions = Opinion::with('author')
            ->published()
            ->where(fn($query) => $query->where('title', 'like', $like)->orWhere('content', 'like', $like))
            ->latest('published_at')->limit(5)->get()
            ->map(fn($item) => $this->format($item, 'Opinion', route('opinions.show', $item->slug)));

        $news = LatestNews::with(['author', 'category'])
            ->published()
            ->where(fn($query) => $query->where('title', 'like', $like)->orWhere('content', 'like', $like))
            ->latest('published_at')->limit(5)->get()
            ->map(fn($item) => $this->format($item, 'News', route('latest-news.show', $item->slug)));

        $results = $articles->concat($judgments)->concat($interviews)->concat($opinions)->concat($news)
                            ->sortByDesc('published_at');

        return view('pages.search', [
            'q'       => $q,
            'results' => $results,
            'total'   => $results->count(),
        ]);
    }

    private function format($item, string $type, string $url): array
    {
        return [
            'type'         => $type,
            'title'        => $item->title,
            'excerpt'      => $item->excerpt ?? '',
            'url'          => $url,
            'published_at' => $item->published_at,
            'author'       => $item->author?->name ?? ($item->court ?? null),
            'category'     => $item->category?->name ?? null,
        ];
    }
}
