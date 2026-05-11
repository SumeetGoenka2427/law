@extends('layouts.app')
@section('title', ($article->meta_title ?? $article->title).' — TestLaw')
@section('meta_description', $article->meta_description ?? $article->excerpt)

@section('content')
<main>
    <div class="container">
        <div class="main-content">
            <div class="content-col">
                <article class="article-detail mt-4">
                    <div class="article-meta mb-3">
                        @if($article->category)<span class="tag">{{ $article->category->name }}</span>@endif
                        <span class="text-muted small ms-2">{{ $article->published_at?->format('F j, Y') }}</span>
                        @if($article->author)<span class="text-muted small ms-2">By {{ $article->author->name }}</span>@endif
                    </div>
                    <h1 class="article-title" style="font-size:2rem;font-weight:700;line-height:1.2;margin-bottom:1rem">{{ $article->title }}</h1>
                    @if($article->excerpt)<p class="article-excerpt text-muted" style="font-size:1.1rem;margin-bottom:1.5rem">{{ $article->excerpt }}</p>@endif
                    @if($article->image)<div class="article-hero-img mb-4"><img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded" style="width:100%" /></div>@endif
                    <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($article->content)) !!}</div>
                    @if($article->tags->isNotEmpty())
                    <div class="article-tags mt-4">
                        @foreach($article->tags as $tag)
                        <span class="badge bg-light text-dark border me-1">{{ $tag->name }}</span>
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
    </div>
</main>
@endsection
