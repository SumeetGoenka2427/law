@extends('layouts.app')
@section('title', 'Interviews — TestLaw')
@section('meta_description', 'Exclusive interviews with India\'s top legal minds.')

@section('content')
<main>
    <div class="container">
        <div class="page-layout">
            <h1 class="section-title mt-0 mb-4"><span class="accent">Exclusive</span> Interviews</h1>
            <div class="news-grid">
                @forelse($interviews as $interview)
                <article class="news-card">
                    <div class="news-card-img">
                        @if($interview->image)<img src="{{ asset('storage/'.$interview->image) }}" alt="{{ $interview->title }}" />
                        @else<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=75" alt="{{ $interview->title }}" />@endif
                        <span class="tag navy">Interview</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-headline"><a href="{{ route('interviews.show', $interview->slug) }}" class="text-inherit text-decoration-none">{{ $interview->title }}</a></h3>
                        <p class="news-desc">{{ $interview->excerpt }}</p>
                        <div class="news-footer">
                            <div class="news-date">{{ $interview->published_at?->diffForHumans() }}</div>
                            <span class="news-author">{{ $interview->interviewee_name }}</span>
                        </div>
                    </div>
                </article>
                @empty
                <div class="text-center py-5 text-muted">No interviews published yet.</div>
                @endforelse
            </div>
            <div class="mt-4">{{ $interviews->links() }}</div>
        </div>
    </div>
</main>
@endsection
