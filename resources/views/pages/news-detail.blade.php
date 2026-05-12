@extends('layouts.app')
@section('title', ($item->meta_title ?? $item->title).' — TestLaw')
@section('meta_description', $item->meta_description ?? $item->excerpt)
@section('og_title', $item->meta_title ?? $item->title)
@section('og_description', $item->meta_description ?? $item->excerpt)
@if($item->og_image)@section('og_image', asset('storage/'.$item->og_image))@endif
@section('og_type', 'article')

@section('content')
<main>
    <div class="container">
        <div class="page-layout">
            <article class="article-detail">
                <div class="article-meta mb-3 d-flex flex-wrap align-items-center gap-2">
                    @if($item->is_breaking)<span class="tag" style="background:#dc3545">Breaking</span>@endif
                    @if($item->category)<span class="tag">{{ $item->category->name }}</span>@endif
                    <span class="text-muted small">{{ $item->published_at?->format('F j, Y') }}</span>
                    @if($item->author)<span class="text-muted small">By {{ $item->author->name }}</span>@endif
                </div>
                <h1 class="article-title">{{ $item->title }}</h1>
                @if($item->excerpt)<p class="text-muted" style="font-size:1.05rem;margin-bottom:1.5rem">{{ $item->excerpt }}</p>@endif
                @if($item->image)<div class="mb-4"><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded w-100" /></div>@endif
                <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($item->content)) !!}</div>

                <div class="mt-4 pt-3 border-top">
                    <x-share-buttons :url="url()->current()" :title="$item->title" />
                </div>
            </article>
        </div>
    </div>
</main>
@endsection
