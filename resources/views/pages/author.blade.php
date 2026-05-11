@extends('layouts.app')
@section('title', $author->name.' — TestLaw')
@section('meta_description', Str::limit($author->bio ?? 'Articles and content by '.$author->name.' on TestLaw.', 160))
@section('og_title', $author->name.' — TestLaw')
@section('og_description', Str::limit($author->bio ?? '', 160))
@if($author->image)@section('og_image', asset('storage/'.$author->image))@endif

@section('content')
<main>
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $author->name }}</li>
            </ol>
        </nav>

        <div class="main-content">
            <div class="content-col">
                {{-- Author Bio Card --}}
                <div class="d-flex align-items-start gap-4 mb-5 mt-2 p-4" style="background:#f8f9fa;border-radius:12px">
                    @if($author->image)
                        <img src="{{ asset('storage/'.$author->image) }}" alt="{{ $author->name }}"
                             style="width:90px;height:90px;border-radius:50%;object-fit:cover;flex-shrink:0" />
                    @else
                        <div style="width:90px;height:90px;border-radius:50%;background:#1a1a2e;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:2rem;flex-shrink:0">
                            {{ strtoupper(substr($author->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <h1 class="h3 fw-bold mb-1">{{ $author->name }}</h1>
                        @if($author->designation)
                            <div class="text-muted mb-2">{{ $author->designation }}</div>
                        @endif
                        @if($author->bio)
                            <p class="mb-2" style="font-size:.95rem;line-height:1.7">{{ $author->bio }}</p>
                        @endif
                        <div class="d-flex gap-3 mt-2">
                            @if($author->twitter)
                                <a href="https://x.com/{{ ltrim($author->twitter, '@') }}" target="_blank" rel="noopener" class="text-muted small text-decoration-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                    </svg>
                                    {{ $author->twitter }}
                                </a>
                            @endif
                            @if($author->email)
                                <a href="mailto:{{ $author->email }}" class="text-muted small text-decoration-none">{{ $author->email }}</a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Articles --}}
                @if($articles->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3">Articles by {{ $author->name }}</h2>
                <div class="news-grid">
                    @foreach($articles as $article)
                    <article class="news-card">
                        <div class="news-card-img">
                            @if($article->image)
                                <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" />
                            @else
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=75" alt="{{ $article->title }}" />
                            @endif
                            @if($article->category)<span class="tag">{{ $article->category->name }}</span>@endif
                        </div>
                        <div class="news-card-body">
                            <h3 class="news-headline">
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-inherit text-decoration-none">{{ $article->title }}</a>
                            </h3>
                            <p class="news-desc">{{ $article->excerpt }}</p>
                            <div class="news-date text-muted small">{{ $article->published_at?->diffForHumans() }}</div>
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="mt-3 mb-5">{{ $articles->links() }}</div>
                @endif

                {{-- Interviews --}}
                @if($interviews->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3 mt-2">Interviews</h2>
                <div class="news-grid">
                    @foreach($interviews as $interview)
                    <article class="news-card">
                        <div class="news-card-body">
                            <span class="tag navy small">Interview</span>
                            <h3 class="news-headline">
                                <a href="{{ route('interviews.show', $interview->slug) }}" class="text-inherit text-decoration-none">{{ $interview->title }}</a>
                            </h3>
                            <div class="news-date text-muted small">{{ $interview->published_at?->diffForHumans() }}</div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @endif

                {{-- Opinions --}}
                @if($opinions->isNotEmpty())
                <h2 class="h5 fw-semibold mb-3 mt-4">Opinions</h2>
                <div class="news-grid">
                    @foreach($opinions as $opinion)
                    <article class="news-card">
                        <div class="news-card-body">
                            <span class="tag small" style="background:#1a1a2e">Opinion</span>
                            <h3 class="news-headline">
                                <a href="{{ route('opinions.show', $opinion->slug) }}" class="text-inherit text-decoration-none">{{ $opinion->title }}</a>
                            </h3>
                            <div class="news-date text-muted small">{{ $opinion->published_at?->diffForHumans() }}</div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @endif

                @if($articles->isEmpty() && $interviews->isEmpty() && $opinions->isEmpty())
                <div class="text-center py-5 text-muted">No published content by this author yet.</div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
