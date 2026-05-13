@extends('layouts.app')
@section('title', 'Articles — Nyay Vidhan')
@section('meta_description', 'Legal articles and analysis from India\'s top legal experts.')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <h1 class="section-title mt-0 mb-4"><span class="accent">Legal</span> Articles</h1>
                <div class="news-grid">
                    @forelse($articles as $article)
                        <article class="news-card">
                            <div class="news-card-img">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" />
                                @else<img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75"
                                        alt="{{ $article->title }}" />
                                @endif
                                <span class="tag">{{ $article->category?->name ?? 'Article' }}</span>
                            </div>
                            <div class="news-card-body">
                                <h3 class="news-headline"><a href="{{ route('articles.show', $article->slug) }}"
                                        class="text-inherit text-decoration-none">{{ $article->title }}</a></h3>
                                <p class="news-desc">{{ $article->excerpt }}</p>
                                <div class="news-footer">
                                    <div class="news-date">{{ $article->published_at?->diffForHumans() }}</div>
                                    @if ($article->author)
                                        <span class="news-author">By {{ $article->author->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-5 text-muted col-span-3">No articles published yet.</div>
                    @endforelse
                </div>
                <div class="mt-4">{{ $articles->links() }}</div>
            </div>
        </div>
    </main>
@endsection
