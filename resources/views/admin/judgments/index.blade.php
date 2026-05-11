@extends('admin.layouts.app')
@section('title', 'Judgments')
@section('page-title', 'Judgments')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Judgments ({{ $judgments->total() }})</strong>
        <a href="{{ route('admin.judgments.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Judgment</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Title</th><th>Court</th><th>Case No.</th><th>Status</th><th>Decided</th><th></th></tr></thead>
            <tbody>
            @forelse($judgments as $j)
            <tr>
                <td>
                    <div class="fw-semibold">{{ Str::limit($j->title, 55) }}</div>
                    <small class="text-muted">{{ $j->category?->name }}</small>
                </td>
                <td class="small">{{ $j->court }}</td>
                <td class="small text-muted">{{ $j->case_number ?? '—' }}</td>
                <td>@include('admin.partials.status-badge', ['status' => $j->status])</td>
                <td class="text-muted small">{{ $j->decided_at?->format('d M Y') ?? '—' }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.judgments.edit', $j) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.judgments.destroy', $j) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-muted">No judgments yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($judgments->hasPages())
    <div class="card-footer">{{ $judgments->links() }}</div>
    @endif
</div>
@endsection
