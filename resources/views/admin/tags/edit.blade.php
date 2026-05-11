@extends('admin.layouts.app')
@section('title', 'Edit Tag')
@section('page-title', 'Edit Tag')

@section('content')
<div class="card" style="max-width:400px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
            @csrf @method('PUT')
            <div class="mb-3"><label class="form-label fw-semibold">Name</label><input type="text" name="name" value="{{ old('name', $tag->name) }}" class="form-control" required /></div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" onsubmit="return confirm('Delete?')" class="ms-auto">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
