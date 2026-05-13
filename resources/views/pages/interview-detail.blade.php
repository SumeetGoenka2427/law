@extends('layouts.app')
@section('title', ($interview->meta_title ?? $interview->title) . ' — Nyay Vidhan')
@section('meta_description', $interview->meta_description ?? $interview->excerpt)
@section('og_title', $interview->meta_title ?? $interview->title)
@section('og_description', $interview->meta_description ?? $interview->excerpt)
@if ($interview->og_image)
    @section('og_image', asset('storage/' . $interview->og_image))
@endif
@section('og_type', 'article')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <article class="article-detail">
                    <div class="mb-3"><span class="tag navy">Interview</span></div>
                    <h1 class="article-title">{{ $interview->title }}</h1>
                    <div class="mb-3 pb-3 border-bottom">
                        <strong>{{ $interview->interviewee_name }}</strong>
                        @if ($interview->interviewee_designation)
                            <span class="text-muted"> — {{ $interview->interviewee_designation }}</span>
                        @endif
                    </div>
                    @if ($interview->image)
                        <div class="mb-4"><img src="{{ asset('storage/' . $interview->image) }}" alt="{{ $interview->title }}"
                                class="img-fluid rounded w-100" /></div>
                    @endif
                    @if ($interview->excerpt)
                        <p class="text-muted" style="font-size:1.05rem;margin-bottom:1.5rem">{{ $interview->excerpt }}</p>
                    @endif
                    <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($interview->content)) !!}</div>
                    @if ($interview->author)
                        <div class="mt-4 pt-3 border-top text-muted small">
                            Interview conducted by
                            <a href="{{ route('author.show', $interview->author->slug) }}"
                                class="text-decoration-none text-muted fw-semibold">{{ $interview->author->name }}</a>
                            @if ($interview->published_at)
                                on {{ $interview->published_at->format('F j, Y') }}
                            @endif
                            <span class="ms-2">· {{ $interview->reading_time }}</span>
                        </div>
                    @endif

                    <div class="mt-3">
                        <x-share-buttons :url="url()->current()" :title="$interview->title" />
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection
