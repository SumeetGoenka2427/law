@extends('admin.layouts.app')
@section('title', 'New Judgment')
@section('page-title', 'New Judgment')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.judgments.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.judgments._form', ['judgment' => null])
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save Judgment</button>
                        <a href="{{ route('admin.judgments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('admin.judgments._sidebar', ['judgment' => null])
    </div>
</div>
@endsection
