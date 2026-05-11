@extends('admin.layouts.app')
@section('title', 'Edit Article')
@section('page-title', 'Edit Article')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('admin.articles._form', ['article' => $article])
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Article</button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('admin.articles._sidebar', ['article' => $article])
    </div>
</div>
@endsection
