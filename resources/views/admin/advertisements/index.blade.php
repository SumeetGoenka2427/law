@extends('admin.layouts.app')
@section('title', 'Advertisements')
@section('page-title', 'Advertisements')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Advertisements ({{ $advertisements->total() }})</strong>
        <a href="{{ route('admin.advertisements.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Ad</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Title</th><th>Position</th><th>Size</th><th>Active</th><th>Expires</th><th></th></tr></thead>
            <tbody>
            @forelse($advertisements as $ad)
            <tr>
                <td class="fw-semibold">{{ $ad->title }}</td>
                <td><span class="badge bg-secondary">{{ $ad->position }}</span></td>
                <td class="small text-muted">{{ $ad->size ?? '—' }}</td>
                <td><span class="badge bg-{{ $ad->is_active ? 'success' : 'secondary' }}">{{ $ad->is_active ? 'Active' : 'Off' }}</span></td>
                <td class="text-muted small">{{ $ad->ends_at?->format('d M Y') ?? '—' }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.advertisements.edit', $ad) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.advertisements.destroy', $ad) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-muted">No advertisements yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($advertisements->hasPages())<div class="card-footer">{{ $advertisements->links() }}</div>@endif
</div>
@endsection
