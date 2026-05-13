@extends('layouts.app')
@section('title', 'Opinions — Nyay Vidhan')
@section('meta_description', 'Expert legal opinions and commentary from India\'s top lawyers and academics.')
@section('og_title', 'Legal Opinions — Nyay Vidhan')
@section('og_description', 'Expert legal opinions and commentary from India\'s top lawyers and academics.')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <h1 class="section-title mt-0 mb-4"><span class="accent">Expert</span> Opinions</h1>
                <div class="news-grid">
                    @forelse($opinions as $opinion)
                        <article class="news-card">
                            <div class="news-card-img">
                                @if ($opinion->image)
                                    <img src="{{ asset('storage/' . $opinion->image) }}" alt="{{ $opinion->title }}" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400&q=75"
                                        alt="{{ $opinion->title }}" />
                                @endif
                                <span class="tag" style="background:#1a1a2e">Opinion</span>
                            </div>
                            <div class="news-card-body">
                                <h3 class="news-headline">
                                    <a href="{{ route('opinions.show', $opinion->slug) }}"
                                        class="text-inherit text-decoration-none">{{ $opinion->title }}</a>
                                </h3>
                                <p class="news-desc">{{ $opinion->excerpt }}</p>
                                <div class="news-footer">
                                    <div class="news-date d-flex align-items-center gap-2 flex-wrap">
                                        <span>{{ $opinion->published_at?->diffForHumans() }}</span>
                                        <span class="text-muted">·</span>
                                        <span class="small text-muted">{{ $opinion->reading_time }}</span>
                                    </div>
                                    @if ($opinion->author)
                                        <span class="news-author">By {{ $opinion->author->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-5 text-muted">No opinions published yet.</div>
                    @endforelse
                </div>
                <div class="mt-4">{{ $opinions->links() }}</div>
            </div>
        </div>
    </main>
@endsection
