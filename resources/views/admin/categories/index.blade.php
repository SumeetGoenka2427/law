@extends('admin.layouts.app')
@section('title', 'Categories')
@section('page-title', 'Categories')

@section('content')
<div class="row g-3">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header fw-semibold">Add Category</div>
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="mb-3"><label class="form-label fw-semibold">Name <span class="text-danger">*</span></label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required /></div>
                    <div class="mb-3"><label class="form-label fw-semibold">Description</label><textarea name="description" rows="2" class="form-control">{{ old('description') }}</textarea></div>
                    <div class="mb-3"><label class="form-label fw-semibold">Color</label><input type="color" name="color" value="{{ old('color', '#1a1a2e') }}" class="form-control form-control-color" /></div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header fw-semibold">All Categories ({{ $categories->total() }})</div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead><tr><th>Name</th><th>Slug</th><th>Articles</th><th></th></tr></thead>
                    <tbody>
                    @forelse($categories as $cat)
                    <tr>
                        <td>
                            <span class="badge me-1" style="background:{{ $cat->color }}">●</span>
                            {{ $cat->name }}
                        </td>
                        <td class="small text-muted">{{ $cat->slug }}</td>
                        <td class="text-center">{{ $cat->articles_count }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-outline-secondary btn-action"><i class="bi bi-pencil"></i></a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-action"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-3 text-muted">No categories yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @if($categories->hasPages())<div class="card-footer">{{ $categories->links() }}</div>@endif
        </div>
    </div>
</div>
@endsection
