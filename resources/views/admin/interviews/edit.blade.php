@extends('admin.layouts.app')
@section('title', 'Edit Interview')
@section('page-title', 'Edit Interview')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.interviews.update', $interview) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('admin.interviews._form', ['interview' => $interview])
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Interview</button>
                        <a href="{{ route('admin.interviews.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('admin.interviews._sidebar', ['interview' => $interview])
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card border-danger">
            <div class="card-header text-danger fw-semibold small">Danger Zone</div>
            <div class="card-body d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="fw-semibold small">Delete this interview</div>
                    <div class="text-muted" style="font-size:.8rem">This action cannot be undone.</div>
                </div>
                <form method="POST" action="{{ route('admin.interviews.destroy', $interview) }}" onsubmit="return confirm('Permanently delete this interview?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
