@extends('layouts.app')
@section('title', 'Judgments — Nyay Vidhan')
@section('meta_description', 'Court judgments and legal decisions from India.')

@section('content')
    <main>
        <div class="container">
            <div class="page-layout">
                <h1 class="section-title mt-0 mb-4">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                    Judgment <span class="accent">Highlights</span>
                </h1>
                <div class="judgment-list">
                    @forelse($judgments as $i => $j)
                        <div class="judgment-item">
                            <div class="judgment-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="judgment-content">
                                <div class="judgment-court">{{ $j->court }}</div>
                                <div class="judgment-title"><a href="{{ route('judgments.show', $j->slug) }}"
                                        class="text-inherit text-decoration-none">{{ $j->title }}</a></div>
                                <div class="judgment-summary">{{ $j->excerpt }}</div>
                                @if ($j->decided_at)
                                    <div class="judgment-date">Decided:
                                        {{ $j->decided_at->format('F j, Y') }}{{ $j->bench ? ' | ' . $j->bench : '' }}</div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 text-muted">No judgments published yet.</div>
                    @endforelse
                </div>
                <div class="mt-4">{{ $judgments->links() }}</div>
            </div>
        </div>
    </main>
@endsection
