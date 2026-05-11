@extends('admin.layouts.app')
@section('title', 'Tags')
@section('page-title', 'Tags')

@section('content')
<div class="row g-3">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header fw-semibold">Add Tag</div>
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.tags.store') }}">
                    @csrf
                    <div class="mb-3"><label class="form-label fw-semibold">Name <span class="text-danger">*</span></label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required /></div>
                    <button type="submit" class="btn btn-primary">Add Tag</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header fw-semibold">All Tags ({{ $tags->total() }})</div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                @forelse($tags as $tag)
                <div class="d-flex align-items-center gap-1 border rounded px-2 py-1 bg-light">
                    <span class="small fw-semibold">{{ $tag->name }}</span>
                    <span class="badge bg-secondary small">{{ $tag->articles_count }}</span>
                    <a href="{{ route('admin.tags.edit', $tag) }}" class="text-secondary ms-1"><i class="bi bi-pencil" style="font-size:.75rem"></i></a>
                    <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" onsubmit="return confirm('Delete?')" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn p-0 text-danger border-0 bg-transparent"><i class="bi bi-x-lg" style="font-size:.75rem"></i></button>
                    </form>
                </div>
                @empty
                <p class="text-muted">No tags yet.</p>
                @endforelse
                </div>
            </div>
            @if($tags->hasPages())<div class="card-footer">{{ $tags->links() }}</div>@endif
        </div>
    </div>
</div>
@endsection
