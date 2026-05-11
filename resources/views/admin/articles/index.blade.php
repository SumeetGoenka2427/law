@extends('admin.layouts.app')
@section('title', 'Articles')
@section('page-title', 'Articles')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Articles ({{ $articles->total() }})</strong>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Article</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)
            <tr>
                <td>
                    <div class="fw-semibold">{{ Str::limit($article->title, 60) }}</div>
                    <small class="text-muted">/{{ $article->slug }}</small>
                </td>
                <td>{{ $article->category?->name ?? '—' }}</td>
                <td>{{ $article->author?->name ?? '—' }}</td>
                <td>@include('admin.partials.status-badge', ['status' => $article->status])</td>
                <td>{{ $article->is_featured ? '⭐' : '' }}</td>
                <td class="text-muted small">{{ $article->created_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Delete this article?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-4 text-muted">No articles yet. <a href="{{ route('admin.articles.create') }}">Create one</a>.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($articles->hasPages())
    <div class="card-footer">{{ $articles->links() }}</div>
    @endif
</div>
@endsection
