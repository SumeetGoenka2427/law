@extends('admin.layouts.app')
@section('title', 'New Article')
@section('page-title', 'New Article')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.articles._form', ['article' => null])
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Publish / Save</button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('admin.articles._sidebar', ['article' => null])
    </div>
</div>
@endsection
