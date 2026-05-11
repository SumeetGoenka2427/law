@extends('layouts.app')
@section('title', ($opinion->meta_title ?? $opinion->title).' — TestLaw')
@section('meta_description', $opinion->meta_description ?? $opinion->excerpt)
@section('og_title', $opinion->meta_title ?? $opinion->title)
@section('og_description', $opinion->meta_description ?? $opinion->excerpt)
@if($opinion->og_image)@section('og_image', asset('storage/'.$opinion->og_image))@endif
@section('og_type', 'article')

@section('content')
<main>
    <div class="container">
        <div class="main-content">
            <div class="content-col">
                <article class="article-detail mt-4">
                    <div class="mb-2">
                        <span class="tag" style="background:#1a1a2e">Opinion</span>
                    </div>
                    <h1 style="font-size:2rem;font-weight:700;line-height:1.2;margin-bottom:1rem">{{ $opinion->title }}</h1>

                    @if($opinion->author)
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                        @if($opinion->author->image)
                            <img src="{{ asset('storage/'.$opinion->author->image) }}" alt="{{ $opinion->author->name }}"
                                 style="width:52px;height:52px;border-radius:50%;object-fit:cover;flex-shrink:0" />
                        @else
                            <div style="width:52px;height:52px;border-radius:50%;background:#1a1a2e;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:1.1rem;flex-shrink:0">
                                {{ strtoupper(substr($opinion->author->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <div class="fw-semibold">
                                <a href="{{ route('author.show', $opinion->author->slug) }}" class="text-decoration-none text-dark">{{ $opinion->author->name }}</a>
                            </div>
                            @if($opinion->author->designation)
                                <div class="text-muted small">{{ $opinion->author->designation }}</div>
                            @endif
                            <div class="text-muted small">
                                {{ $opinion->published_at?->format('F j, Y') }}
                                <span class="mx-1">·</span>
                                {{ $opinion->reading_time }}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($opinion->excerpt)
                        <p class="article-excerpt text-muted" style="font-size:1.1rem;margin-bottom:1.5rem;font-style:italic">{{ $opinion->excerpt }}</p>
                    @endif

                    @if($opinion->image)
                        <div class="article-hero-img mb-4">
                            <img src="{{ asset('storage/'.$opinion->image) }}" alt="{{ $opinion->title }}" class="img-fluid rounded" style="width:100%" />
                        </div>
                    @endif

                    <div class="article-body" style="line-height:1.9;font-size:1.05rem">{!! nl2br(e($opinion->content)) !!}</div>

                    <div class="mt-4 pt-3 border-top">
                        <x-share-buttons :url="url()->current()" :title="$opinion->title" />
                    </div>
                </article>

                @if($related->isNotEmpty())
                <div class="related-articles mt-5">
                    <h3 class="section-title"><span class="accent">More</span> Opinions</h3>
                    <div class="news-grid">
                        @foreach($related as $r)
                        <article class="news-card">
                            <div class="news-card-body">
                                <span class="tag small" style="background:#1a1a2e">Opinion</span>
                                <h3 class="news-headline">
                                    <a href="{{ route('opinions.show', $r->slug) }}" class="text-inherit text-decoration-none">{{ $r->title }}</a>
                                </h3>
                                <div class="news-date text-muted small">
                                    {{ $r->published_at?->diffForHumans() }}
                                    @if($r->author) · By {{ $r->author->name }}@endif
                                </div>
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
