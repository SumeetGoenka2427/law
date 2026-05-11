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
                <div class="mb-3"><label class="form-label fw-semibold">Title <span class="text-danger">*</span></label><input type="text" name="title" value="{{ old('title') }}" class="form-control" required /></div>
                <div class="mb-3"><label class="form-label fw-semibold">Author</label><select name="author_id" class="form-select"><option value="">— Select Author —</option>@foreach($authors as $a)<option value="{{ $a->id }}" {{ old('author_id') == $a->id ? 'selected' : '' }}>{{ $a->name }}</option>@endforeach</select></div>
                <div class="mb-3"><label class="form-label fw-semibold">Excerpt</label><textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt') }}</textarea></div>
                <div class="mb-3"><label class="form-label fw-semibold">Content <span class="text-danger">*</span></label><textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>@error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label fw-semibold">Image</label><input type="file" name="image" class="form-control" accept="image/*" /></div>
                <hr /><h6>SEO</h6>
                <div class="mb-3"><label class="form-label">Meta Title</label><input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control" /></div>
                <div class="mb-3"><label class="form-label">Meta Description</label><textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description') }}</textarea></div>
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Opinion</button>
                    <a href="{{ route('admin.opinions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">
        <div class="card"><div class="card-header fw-semibold">Publish Settings</div><div class="card-body">
            <div class="mb-3"><label class="form-label fw-semibold">Status</label><select name="status" class="form-select" form="opinion-form">@foreach(['draft','published','archived'] as $s)<option value="{{ $s }}" {{ old('status','draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
            <div class="form-check"><input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" /><label class="form-check-label" for="is_featured">Featured</label></div>
        </div></div>
    </div>
</div>
@endsection
