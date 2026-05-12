@extends('layouts.app')
@section('title', 'Latest News — TestLaw')
@section('meta_description', 'Latest legal news from courts across India.')

@section('content')
<main>
    <div class="container">
        <div class="page-layout">
            <h1 class="section-title mt-0 mb-4"><span class="accent">Latest</span> News</h1>
            <div class="news-grid">
                @forelse($news as $item)
                <article class="news-card">
                    <div class="news-card-img">
                        @if($item->image)<img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" />
                        @else<img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75" alt="{{ $item->title }}" />@endif
                        <div class="news-card-img-tags">
                            @if($item->is_breaking)<span class="tag" style="background:#dc3545">Breaking</span>@endif
                            <span class="tag">{{ $item->category?->name ?? 'News' }}</span>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-headline"><a href="{{ route('latest-news.show', $item->slug) }}" class="text-inherit text-decoration-none">{{ $item->title }}</a></h3>
                        <p class="news-desc">{{ $item->excerpt }}</p>
                        <div class="news-footer">
                            <div class="news-date">{{ $item->published_at?->diffForHumans() }}</div>
                            @if($item->author)<span class="news-author">By {{ $item->author->name }}</span>@endif
                        </div>
                    </div>
                </article>
                @empty
                <div class="text-center py-5 text-muted">No news published yet.</div>
                @endforelse
            </div>
            <div class="mt-4">{{ $news->links() }}</div>
        </div>
    </div>
</main>
@endsection
