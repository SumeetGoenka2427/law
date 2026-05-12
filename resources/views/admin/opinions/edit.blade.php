@extends('admin.layouts.app')
@section('title', 'Edit Opinion')
@section('page-title', 'Edit Opinion')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card"><div class="card-body">
            @include('admin.partials.alerts')
            <form method="POST" action="{{ route('admin.opinions.update', $opinion) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('admin.opinions._form', ['opinion' => $opinion])
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Opinion</button>
                    <a href="{{ route('admin.opinions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">
        @include('admin.opinions._sidebar', ['opinion' => $opinion])
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card border-danger">
            <div class="card-header text-danger fw-semibold small">Danger Zone</div>
            <div class="card-body d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="fw-semibold small">Delete this opinion</div>
                    <div class="text-muted" style="font-size:.8rem">This action cannot be undone.</div>
                </div>
                <form method="POST" action="{{ route('admin.opinions.destroy', $opinion) }}" onsubmit="return confirm('Permanently delete this opinion?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
