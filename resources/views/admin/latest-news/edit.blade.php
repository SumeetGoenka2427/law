@extends('admin.layouts.app')
@section('title', 'Edit News Item')
@section('page-title', 'Edit News Item')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card"><div class="card-body">
            @include('admin.partials.alerts')
            <form method="POST" action="{{ route('admin.latest-news.update', $latestNews) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('admin.latest-news._form', ['latestNews' => $latestNews])
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update News</button>
                    <a href="{{ route('admin.latest-news.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">@include('admin.latest-news._sidebar', ['latestNews' => $latestNews])</div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card border-danger">
            <div class="card-header text-danger fw-semibold small">Danger Zone</div>
            <div class="card-body d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="fw-semibold small">Delete this news item</div>
                    <div class="text-muted" style="font-size:.8rem">This action cannot be undone.</div>
                </div>
                <form method="POST" action="{{ route('admin.latest-news.destroy', $latestNews) }}" onsubmit="return confirm('Permanently delete this news item?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
