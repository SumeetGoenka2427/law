@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf @method('PUT')
            <div class="mb-3"><label class="form-label fw-semibold">Name <span class="text-danger">*</span></label><input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required /></div>
            <div class="mb-3"><label class="form-label fw-semibold">Description</label><textarea name="description" rows="2" class="form-control">{{ old('description', $category->description) }}</textarea></div>
            <div class="mb-3"><label class="form-label fw-semibold">Color</label><input type="color" name="color" value="{{ old('color', $category->color) }}" class="form-control form-control-color" /></div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete?')" class="ms-auto">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
