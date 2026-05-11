@extends('admin.layouts.app')
@section('title', 'Interviews')
@section('page-title', 'Interviews')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Interviews ({{ $interviews->total() }})</strong>
        <a href="{{ route('admin.interviews.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Interview</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Title</th><th>Interviewee</th><th>Author</th><th>Status</th><th>Date</th><th></th></tr></thead>
            <tbody>
            @forelse($interviews as $item)
            <tr>
                <td><div class="fw-semibold">{{ Str::limit($item->title, 55) }}</div></td>
                <td class="small">{{ $item->interviewee_name }}<br><span class="text-muted">{{ $item->interviewee_designation }}</span></td>
                <td class="small">{{ $item->author?->name ?? '—' }}</td>
                <td>@include('admin.partials.status-badge', ['status' => $item->status])</td>
                <td class="text-muted small">{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.interviews.edit', $item) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.interviews.destroy', $item) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-muted">No interviews yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($interviews->hasPages())<div class="card-footer">{{ $interviews->links() }}</div>@endif
</div>
@endsection
