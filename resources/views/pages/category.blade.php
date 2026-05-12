@extends('layouts.app')
@section('title', $category->name.' — TestLaw')
@section('meta_description', $category->description ?? 'Browse '.$category->name.' coverage on TestLaw.')
@section('og_title', $category->name.' — TestLaw')
@section('og_description', $category->description ?? 'Browse '.$category->name.' coverage on TestLaw.')

@section('content')
<main>
    <div class="container">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="page-layout">
                <div class="d-flex align-items-center gap-2 mb-4">
                    @if($category->color)
                        <span style="width:6px;height:36px;border-radius:3px;background:{{ $category->color }};display:inline-block;flex-shrink:0"></span>
                    @endif
                    <h1 class="section-title mb-0">{{ $category->name }}</h1>
                </div>
                @if($category->description)
                    <p class="text-muted mb-4">{{ $category->description }}</p>
                @endif

                {{-- Articles --}}
                @if($articles->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3 mt-2">Articles</h2>
                <div class="news-grid">
                    @foreach($articles as $article)
                    <article class="news-card">
                        <div class="news-card-img">
                            @if($article->image)
                                <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" />
                            @else
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75" alt="{{ $article->title }}" />
                            @endif
                            <span class="tag">{{ $category->name }}</span>
                        </div>
                        <div class="news-card-body">
                            <h3 class="news-headline">
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-inherit text-decoration-none">{{ $article->title }}</a>
                            </h3>
                            <p class="news-desc">{{ $article->excerpt }}</p>
                            <div class="news-footer">
                                <span class="news-date">{{ $article->published_at?->diffForHumans() }}</span>
                                @if($article->author)<span class="news-author">By {{ $article->author->name }}</span>@endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="mt-3 mb-4">{{ $articles->links() }}</div>
                @endif

                {{-- Judgments --}}
                @if($judgments->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3 mt-4">Judgments</h2>
                <div class="judgment-list">
                    @foreach($judgments as $i => $j)
                    <div class="judgment-item">
                        <div class="judgment-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="judgment-content">
                            <div class="judgment-court">{{ $j->court }}</div>
                            <div class="judgment-title">
                                <a href="{{ route('judgments.show', $j->slug) }}" class="text-inherit text-decoration-none">{{ $j->title }}</a>
                            </div>
                            @if($j->decided_at)<div class="judgment-date">Decided: {{ $j->decided_at->format('F j, Y') }}</div>@endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- News --}}
                @if($news->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3 mt-4">Latest News</h2>
                <div class="news-grid">
                    @foreach($news as $item)
                    <article class="news-card">
                        <div class="news-card-body">
                            @if($item->is_breaking)<span class="tag" style="background:#dc3545">Breaking</span>@endif
                            <h3 class="news-headline">
                                <a href="{{ route('latest-news.show', $item->slug) }}" class="text-inherit text-decoration-none">{{ $item->title }}</a>
                            </h3>
                            <div class="news-date text-muted small">{{ $item->published_at?->diffForHumans() }}</div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @endif

                @if($articles->isEmpty() && $judgments->isEmpty() && $news->isEmpty())
                <div class="text-center py-5 text-muted">No published content in this category yet.</div>
                @endif
        </div>
    </div>
</main>
@endsection
