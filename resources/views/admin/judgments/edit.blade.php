@extends('admin.layouts.app')
@section('title', 'Edit Judgment')
@section('page-title', 'Edit Judgment')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.judgments.update', $judgment) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('admin.judgments._form', ['judgment' => $judgment])
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Judgment</button>
                        <a href="{{ route('admin.judgments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('admin.judgments._sidebar', ['judgment' => $judgment])
    </div>
</div>
@endsection
