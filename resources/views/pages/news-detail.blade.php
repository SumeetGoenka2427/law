@extends('layouts.app')
@section('title', ($item->meta_title ?? $item->title).' — TestLaw')
@section('meta_description', $item->meta_description ?? $item->excerpt)

@section('content')
<main>
    <div class="container">
        <div class="main-content">
            <div class="content-col">
                <article class="article-detail mt-4">
                    <div class="article-meta mb-3">
                        @if($item->is_breaking)<span class="tag" style="background:#dc3545">Breaking</span>@endif
                        @if($item->category)<span class="tag">{{ $item->category->name }}</span>@endif
                        <span class="text-muted small ms-2">{{ $item->published_at?->format('F j, Y') }}</span>
                        @if($item->author)<span class="text-muted small ms-2">By {{ $item->author->name }}</span>@endif
                    </div>
                    <h1 style="font-size:2rem;font-weight:700;line-height:1.2;margin-bottom:1rem">{{ $item->title }}</h1>
                    @if($item->excerpt)<p class="text-muted" style="font-size:1.1rem;margin-bottom:1.5rem">{{ $item->excerpt }}</p>@endif
                    @if($item->image)<div class="mb-4"><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded" /></div>@endif
                    <div class="article-body" style="line-height:1.8;font-size:1.05rem">{!! nl2br(e($item->content)) !!}</div>
                </article>
            </div>
        </div>
    </div>
</main>
@endsection
