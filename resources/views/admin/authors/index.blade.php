@extends('admin.layouts.app')
@section('title', 'Authors')
@section('page-title', 'Authors')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>All Authors ({{ $authors->total() }})</strong>
        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Author</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Name</th><th>Designation</th><th>Email</th><th>Status</th><th>Articles</th><th></th></tr></thead>
            <tbody>
            @forelse($authors as $author)
            <tr>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        @if($author->image)<img src="{{ asset('storage/'.$author->image) }}" width="36" height="36" class="rounded-circle" />@else<div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:14px">{{ substr($author->name,0,1) }}</div>@endif
                        <span class="fw-semibold">{{ $author->name }}</span>
                    </div>
                </td>
                <td class="small text-muted">{{ $author->designation ?? '—' }}</td>
                <td class="small">{{ $author->email ?? '—' }}</td>
                <td><span class="badge bg-{{ $author->is_active ? 'success' : 'secondary' }}">{{ $author->is_active ? 'Active' : 'Inactive' }}</span></td>
                <td class="text-center">{{ $author->articles_count ?? 0 }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-muted">No authors yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($authors->hasPages())<div class="card-footer">{{ $authors->links() }}</div>@endif
</div>
@endsection
