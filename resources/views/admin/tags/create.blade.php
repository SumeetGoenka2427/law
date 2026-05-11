@extends('admin.layouts.app')
@section('title', 'New Tag')
@section('page-title', 'New Tag')

@section('content')
<div class="card" style="max-width:400px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.tags.store') }}">
            @csrf
            <div class="mb-3"><label class="form-label fw-semibold">Name</label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required /></div>
            <div class="d-flex gap-2"><button type="submit" class="btn btn-primary">Create</button><a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
