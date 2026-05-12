@extends('layouts.app')
@section('title', ($article->meta_title ?? $article->title).' — TestLaw')
@section('meta_description', $article->meta_description ?? $article->excerpt)
@section('og_title', $article->meta_title ?? $article->title)
@section('og_description', $article->meta_description ?? $article->excerpt)
@if($article->og_image)@section('og_image', asset('storage/'.$article->og_image))@endif
@section('og_type', 'article')

@section('content')
<main>
    <div class="container">
        <div class="page-layout">
            <article class="article-detail">
                <div class="article-meta mb-3 d-flex flex-wrap align-items-center gap-2">
                    @if($article->category)<span class="tag">{{ $article->category->name }}</span>@endif
                    <span class="text-muted small">{{ $article->published_at?->format('F j, Y') }}</span>
                    @if($article->author)
                        <span class="text-muted small">By
                            <a href="{{ route('author.show', $article->author->slug) }}" class="text-decoration-none text-muted fw-semibold">{{ $article->author->name }}</a>
                        </span>
                    @endif
                    <span class="text-muted small">· {{ $article->reading_time }}</span>
                </div>
                <h1 class="article-title">{{ $article->title }}</h1>
                @if($article->excerpt)<p class="article-excerpt text-muted" style="font-size:1.05rem;margin-bottom:1.5rem">{{ $article->excerpt }}</p>@endif
                @if($article->image)<div class="article-hero-img mb-4"><img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded w-100" /></div>@endif
                <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($article->content)) !!}</div>

                <div class="mt-4 pt-3 border-top">
                    <x-share-buttons :url="url()->current()" :title="$article->title" />
                </div>

                @if($article->tags->isNotEmpty())
                <div class="article-tags mt-4 d-flex flex-wrap gap-1">
                    @foreach($article->tags as $tag)
                    <a href="{{ route('tag.show', $tag->slug) }}" class="badge bg-light text-dark border text-decoration-none">{{ $tag->name }}</a>
                    @endforeach
                </div>
                @endif
            </article>

            @if($related->isNotEmpty())
            <div class="related-articles mt-5">
                <h3 class="section-title"><span class="accent">Related</span> Articles</h3>
                <div class="news-grid">
                    @foreach($related as $r)
                    <article class="news-card">
                        <div class="news-card-body">
                            <span class="tag small">{{ $r->category?->name }}</span>
                            <h3 class="news-headline"><a href="{{ route('articles.show', $r->slug) }}" class="text-inherit text-decoration-none">{{ $r->title }}</a></h3>
                            <div class="news-date text-muted small">{{ $r->published_at?->diffForHumans() }}</div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
