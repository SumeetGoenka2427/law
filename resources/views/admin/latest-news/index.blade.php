@extends('admin.layouts.app')
@section('title', 'Latest News')
@section('page-title', 'Latest News')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All News Items ({{ $news->total() }})</strong>
        <a href="{{ route('admin.latest-news.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New News</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Title</th><th>Category</th><th>Breaking</th><th>Status</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @forelse($news as $item)
            <tr>
                <td><div class="fw-semibold">{{ Str::limit($item->title, 60) }}</div><small class="text-muted">{{ $item->author?->name }}</small></td>
                <td class="small">{{ $item->category?->name ?? '—' }}</td>
                <td>{{ $item->is_breaking ? '<span class="badge bg-danger">Breaking</span>' : '' }}</td>
                <td>@include('admin.partials.status-badge', ['status' => $item->status])</td>
                <td class="text-muted small">{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.latest-news.edit', $item) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.latest-news.destroy', $item) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-muted">No news items yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($news->hasPages())<div class="card-footer">{{ $news->links() }}</div>@endif
</div>
@endsection
