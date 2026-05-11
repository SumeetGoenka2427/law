@extends('admin.layouts.app')
@section('title', 'Opinions')
@section('page-title', 'Opinions')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Opinions ({{ $opinions->total() }})</strong>
        <a href="{{ route('admin.opinions.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Opinion</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Title</th><th>Author</th><th>Status</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @forelse($opinions as $item)
            <tr>
                <td><div class="fw-semibold">{{ Str::limit($item->title, 60) }}</div></td>
                <td>{{ $item->author?->name ?? '—' }}</td>
                <td>@include('admin.partials.status-badge', ['status' => $item->status])</td>
                <td class="text-muted small">{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.opinions.edit', $item) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.opinions.destroy', $item) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4 text-muted">No opinions yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($opinions->hasPages())<div class="card-footer">{{ $opinions->links() }}</div>@endif
</div>
@endsection
