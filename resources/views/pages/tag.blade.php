@extends('layouts.app')
@section('title', '#' . $tag->name . ' — Nyay Vidhan')
@section('meta_description', 'Articles tagged with ' . $tag->name . ' on Nyay Vidhan.')
@section('og_title', '#' . $tag->name . ' — Nyay Vidhan')
@section('og_description', 'Browse all articles tagged with ' . $tag->name . '.')

@section('content')
    <main>
        <div class="container">
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articles') }}">Articles</a></li>
                    <li class="breadcrumb-item active">#{{ $tag->name }}</li>
                </ol>
            </nav>

            <div class="page-layout">
                <h1 class="section-title mt-2">
                    <span class="accent">#{{ $tag->name }}</span>
                </h1>
                <p class="text-muted mb-4">{{ $articles->total() }} article{{ $articles->total() !== 1 ? 's' : '' }} tagged
                    with <strong>#{{ $tag->name }}</strong></p>

                <div class="news-grid">
                    @forelse($articles as $article)
                        <article class="news-card">
                            <div class="news-card-img">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75"
                                        alt="{{ $article->title }}" />
                                @endif
                                @if ($article->category)
                                    <span class="tag">{{ $article->category->name }}</span>
                                @endif
                            </div>
                            <div class="news-card-body">
                                <h3 class="news-headline">
                                    <a href="{{ route('articles.show', $article->slug) }}"
                                        class="text-inherit text-decoration-none">{{ $article->title }}</a>
                                </h3>
                                <p class="news-desc">{{ $article->excerpt }}</p>
                                <div class="news-footer">
                                    <span class="news-date">{{ $article->published_at?->diffForHumans() }}</span>
                                    @if ($article->author)
                                        <span class="news-author">By {{ $article->author->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-5 text-muted">No articles found for this tag.</div>
                    @endforelse
                </div>
                <div class="mt-4">{{ $articles->links() }}</div>
            </div>
        </div>
    </main>
@endsection
