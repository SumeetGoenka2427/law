@extends('admin.layouts.app')
@section('title', 'New Category')
@section('page-title', 'New Category')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="mb-3"><label class="form-label fw-semibold">Name <span class="text-danger">*</span></label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required /></div>
            <div class="mb-3"><label class="form-label fw-semibold">Description</label><textarea name="description" rows="2" class="form-control">{{ old('description') }}</textarea></div>
            <div class="mb-3"><label class="form-label fw-semibold">Color</label><input type="color" name="color" value="{{ old('color', '#1a1a2e') }}" class="form-control form-control-color" /></div>
            <div class="d-flex gap-2"><button type="submit" class="btn btn-primary">Create</button><a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
