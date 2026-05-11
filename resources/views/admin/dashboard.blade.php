@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card stat-card primary p-3">
            <div class="stat-number text-primary">{{ $stats['articles'] }}</div>
            <div class="stat-label">Articles</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card success p-3">
            <div class="stat-number text-success">{{ $stats['judgments'] }}</div>
            <div class="stat-label">Judgments</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card warning p-3">
            <div class="stat-number text-warning">{{ $stats['news'] }}</div>
            <div class="stat-label">News Items</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card info p-3">
            <div class="stat-number text-info">{{ $stats['interviews'] }}</div>
            <div class="stat-label">Interviews</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card purple p-3">
            <div class="stat-number text-purple" style="color:#6f42c1">{{ $stats['opinions'] }}</div>
            <div class="stat-label">Opinions</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card danger p-3">
            <div class="stat-number text-danger">{{ $stats['authors'] }}</div>
            <div class="stat-label">Authors</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card primary p-3">
            <div class="stat-number text-primary">{{ $stats['categories'] }}</div>
            <div class="stat-label">Categories</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card stat-card success p-3">
            <div class="stat-number text-success">{{ $stats['published'] }}</div>
            <div class="stat-label">Published Total</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Recent Articles</strong>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">+ New</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Title</th><th>Author</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                    @forelse($recentArticles as $article)
                    <tr>
                        <td><a href="{{ route('admin.articles.edit', $article) }}" class="text-decoration-none">{{ Str::limit($article->title, 50) }}</a></td>
                        <td>{{ $article->author?->name ?? '—' }}</td>
                        <td><span class="badge badge-{{ $article->status }}">{{ ucfirst($article->status) }}</span></td>
                        <td class="text-muted small">{{ $article->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-3">No articles yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Recent Judgments</strong>
                <a href="{{ route('admin.judgments.create') }}" class="btn btn-sm btn-primary">+ New</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Title</th><th>Court</th><th>Status</th></tr></thead>
                    <tbody>
                    @forelse($recentJudgments as $judgment)
                    <tr>
                        <td><a href="{{ route('admin.judgments.edit', $judgment) }}" class="text-decoration-none">{{ Str::limit($judgment->title, 40) }}</a></td>
                        <td class="text-muted small">{{ Str::limit($judgment->court, 20) }}</td>
                        <td><span class="badge badge-{{ $judgment->status }}">{{ ucfirst($judgment->status) }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center text-muted py-3">No judgments yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><strong>Quick Actions</strong></div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-plus"></i> New Article</a>
                <a href="{{ route('admin.judgments.create') }}" class="btn btn-outline-success btn-sm"><i class="bi bi-plus"></i> New Judgment</a>
                <a href="{{ route('admin.latest-news.create') }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-plus"></i> New News Item</a>
                <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-plus"></i> New Author</a>
            </div>
        </div>
    </div>
</div>
@endsection
