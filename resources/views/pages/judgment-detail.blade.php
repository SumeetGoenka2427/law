@extends('layouts.app')
@section('title', ($judgment->meta_title ?? $judgment->title) . ' — Nyay Vidhan')
@section('meta_description', $judgment->meta_description ?? $judgment->excerpt)
@section('og_title', $judgment->meta_title ?? $judgment->title)
@section('og_description', $judgment->meta_description ?? $judgment->excerpt)
@if ($judgment->og_image)
    @section('og_image', asset('storage/' . $judgment->og_image))
@endif
@section('og_type', 'article')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <article class="article-detail">
                    <div class="judgment-court mb-2">{{ $judgment->court }}</div>
                    @if ($judgment->case_number)
                        <div class="text-muted small mb-1">Case: {{ $judgment->case_number }}</div>
                    @endif
                    <h1 class="judgment-title-h1">{{ $judgment->title }}</h1>
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        @if ($judgment->decided_at)
                            <span class="text-muted small">Decided: {{ $judgment->decided_at->format('F j, Y') }}</span>
                        @endif
                        @if ($judgment->bench)
                            <span class="text-muted small">{{ $judgment->bench }}</span>
                        @endif
                        @if ($judgment->category)
                            <span class="tag small">{{ $judgment->category->name }}</span>
                        @endif
                    </div>
                    @if ($judgment->excerpt)
                        <p class="text-muted" style="font-size:1.05rem;margin-bottom:1.5rem">{{ $judgment->excerpt }}</p>
                    @endif
                    @if ($judgment->pdf_file)
                        <div class="mb-4"><a href="{{ asset('storage/' . $judgment->pdf_file) }}" target="_blank"
                                class="btn btn-outline-dark btn-sm"><svg width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                    <polyline points="14 2 14 8 20 8" />
                                </svg> Download PDF</a></div>
                    @endif
                    <div class="article-body" style="line-height:1.8;font-size:1rem">{!! nl2br(e($judgment->content)) !!}</div>

                    <div class="mt-4 pt-3 border-top">
                        <x-share-buttons :url="url()->current()" :title="$judgment->title" />
                    </div>
                </article>
                @if ($related->isNotEmpty())
                    <div class="mt-5">
                        <h3 class="section-title"><span class="accent">Related</span> Judgments</h3>
                        <div class="judgment-list">
                            @foreach ($related as $r)
                                <div class="judgment-item">
                                    <div class="judgment-content">
                                        <div class="judgment-court">{{ $r->court }}</div>
                                        <div class="judgment-title"><a href="{{ route('judgments.show', $r->slug) }}"
                                                class="text-inherit text-decoration-none">{{ $r->title }}</a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
