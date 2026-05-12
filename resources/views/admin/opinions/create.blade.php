@extends('admin.layouts.app')
@section('title', 'New Opinion')
@section('page-title', 'New Opinion')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card"><div class="card-body">
            @include('admin.partials.alerts')
            <form method="POST" action="{{ route('admin.opinions.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.opinions._form', ['opinion' => null])
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Opinion</button>
                    <a href="{{ route('admin.opinions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">
        @include('admin.opinions._sidebar', ['opinion' => null])
    </div>
</div>
@endsection
