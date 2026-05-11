@extends('layouts.app')
@section('title', ($interview->meta_title ?? $interview->title).' — TestLaw')
@section('meta_description', $interview->meta_description ?? $interview->excerpt)

@section('content')
<main>
    <div class="container">
        <div class="main-content">
            <div class="content-col">
                <article class="article-detail mt-4">
                    <div class="mb-3"><span class="tag navy">Interview</span></div>
                    <h1 style="font-size:2rem;font-weight:700;line-height:1.2;margin-bottom:1rem">{{ $interview->title }}</h1>
                    <div class="mb-3 pb-3 border-bottom">
                        <strong>{{ $interview->interviewee_name }}</strong>
                        @if($interview->interviewee_designation)<span class="text-muted"> — {{ $interview->interviewee_designation }}</span>@endif
                    </div>
                    @if($interview->image)<div class="mb-4"><img src="{{ asset('storage/'.$interview->image) }}" alt="{{ $interview->title }}" class="img-fluid rounded" /></div>@endif
                    @if($interview->excerpt)<p class="text-muted" style="font-size:1.1rem;margin-bottom:1.5rem">{{ $interview->excerpt }}</p>@endif
                    <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($interview->content)) !!}</div>
                    @if($interview->author)
                    <div class="mt-4 pt-3 border-top text-muted small">
                        Interview conducted by {{ $interview->author->name }}
                        @if($interview->published_at) on {{ $interview->published_at->format('F j, Y') }}@endif
                    </div>
                    @endif
                </article>
            </div>
        </div>
    </div>
</main>
@endsection
