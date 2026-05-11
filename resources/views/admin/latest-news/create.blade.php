@extends('admin.layouts.app')
@section('title', 'New News Item')
@section('page-title', 'New News Item')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card"><div class="card-body">
            @include('admin.partials.alerts')
            <form method="POST" action="{{ route('admin.latest-news.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.latest-news._form', ['latestNews' => null])
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save News</button>
                    <a href="{{ route('admin.latest-news.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">@include('admin.latest-news._sidebar', ['latestNews' => null])</div>
</div>
@endsection
