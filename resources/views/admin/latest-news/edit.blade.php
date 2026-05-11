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
@endsection
