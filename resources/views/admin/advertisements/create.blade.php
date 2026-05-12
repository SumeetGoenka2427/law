@extends('admin.layouts.app')
@section('title', 'New Advertisement')
@section('page-title', 'New Advertisement')

@section('content')
<div class="card" style="max-width:700px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.advertisements.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label fw-semibold">Title <span class="text-danger">*</span></label><input type="text" name="title" value="{{ old('title') }}" class="form-control" required /></div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Position <span class="text-danger">*</span></label>
                    <select name="position" class="form-select" required>
                        <option value="">— Select —</option>
                        @foreach(['leaderboard','sidebar-top','sidebar-mid','sidebar-bottom','in-article','footer'] as $p)
                        <option value="{{ $p }}" {{ old('position') == $p ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $p)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label fw-semibold">Size (e.g. 728×90)</label><input type="text" name="size" value="{{ old('size') }}" class="form-control" /></div>
                <div class="col-md-6"><label class="form-label fw-semibold">Click URL</label><input type="url" name="url" value="{{ old('url') }}" class="form-control" /></div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Image</label>
                <x-admin.drag-upload name="image" :existing="null" />
            </div>
            <div class="mb-3"><label class="form-label fw-semibold">Embed Code (optional)</label><textarea name="code" rows="3" class="form-control" placeholder="<script>...">{{ old('code') }}</textarea></div>
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label">Start Date</label><input type="datetime-local" name="starts_at" value="{{ old('starts_at') }}" class="form-control" /></div>
                <div class="col-md-6"><label class="form-label">End Date</label><input type="datetime-local" name="ends_at" value="{{ old('ends_at') }}" class="form-control" /></div>
            </div>
            <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" checked /><label class="form-check-label" for="is_active">Active</label></div>
            <div class="d-flex gap-2"><button type="submit" class="btn btn-primary">Create Ad</button><a href="{{ route('admin.advertisements.index') }}" class="btn btn-outline-secondary">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
