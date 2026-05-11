@extends('admin.layouts.app')
@section('title', 'Edit Opinion')
@section('page-title', 'Edit Opinion')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card"><div class="card-body">
            @include('admin.partials.alerts')
            <form method="POST" action="{{ route('admin.opinions.update', $opinion) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3"><label class="form-label fw-semibold">Title <span class="text-danger">*</span></label><input type="text" name="title" value="{{ old('title', $opinion->title) }}" class="form-control" required /></div>
                <div class="mb-3"><label class="form-label fw-semibold">Author</label><select name="author_id" class="form-select"><option value="">— Select Author —</option>@foreach($authors as $a)<option value="{{ $a->id }}" {{ old('author_id', $opinion->author_id) == $a->id ? 'selected' : '' }}>{{ $a->name }}</option>@endforeach</select></div>
                <div class="mb-3"><label class="form-label fw-semibold">Excerpt</label><textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $opinion->excerpt) }}</textarea></div>
                <div class="mb-3"><label class="form-label fw-semibold">Content <span class="text-danger">*</span></label><textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $opinion->content) }}</textarea>@error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label fw-semibold">Image</label>@if($opinion->image)<div class="mb-2"><img src="{{ asset('storage/'.$opinion->image) }}" height="80" class="rounded" /></div>@endif<input type="file" name="image" class="form-control" accept="image/*" /></div>
                <hr /><h6>SEO</h6>
                <div class="mb-3"><label class="form-label">Meta Title</label><input type="text" name="meta_title" value="{{ old('meta_title', $opinion->meta_title) }}" class="form-control" /></div>
                <div class="mb-3"><label class="form-label">Meta Description</label><textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $opinion->meta_description) }}</textarea></div>
                <div class="mb-3"><label class="form-label fw-semibold">Status</label><select name="status" class="form-select">@foreach(['draft','published','archived'] as $s)<option value="{{ $s }}" {{ old('status',$opinion->status) == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
                <div class="form-check mb-3"><input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" {{ $opinion->is_featured ? 'checked' : '' }} /><label class="form-check-label" for="is_featured">Featured</label></div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Opinion</button>
                    <a href="{{ route('admin.opinions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div></div>
    </div>
    <div class="col-lg-4">
        <div class="card"><div class="card-body">
            <form method="POST" action="{{ route('admin.opinions.destroy', $opinion) }}" onsubmit="return confirm('Delete?')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-trash"></i> Delete Opinion</button>
            </form>
        </div></div>
    </div>
</div>
@endsection
