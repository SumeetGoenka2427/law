@extends('admin.layouts.app')
@section('title', 'Edit Author')
@section('page-title', 'Edit Author')

@section('content')
<div class="card" style="max-width:700px">
    <div class="card-body">
        @include('admin.partials.alerts')
        <form method="POST" action="{{ route('admin.authors.update', $author) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label><input type="text" name="name" value="{{ old('name', $author->name) }}" class="form-control" required /></div>
                <div class="col-md-6"><label class="form-label fw-semibold">Designation</label><input type="text" name="designation" value="{{ old('designation', $author->designation) }}" class="form-control" /></div>
            </div>
            <div class="mb-3"><label class="form-label fw-semibold">Bio</label><textarea name="bio" rows="3" class="form-control">{{ old('bio', $author->bio) }}</textarea></div>
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label fw-semibold">Email</label><input type="email" name="email" value="{{ old('email', $author->email) }}" class="form-control" /></div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Photo</label>
                    @if($author->image)<div class="mb-2"><img src="{{ asset('storage/'.$author->image) }}" height="60" class="rounded-circle" /></div>@endif
                    <input type="file" name="image" class="form-control" accept="image/*" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label">Twitter</label><input type="text" name="twitter" value="{{ old('twitter', $author->twitter) }}" class="form-control" /></div>
                <div class="col-md-6"><label class="form-label">LinkedIn</label><input type="text" name="linkedin" value="{{ old('linkedin', $author->linkedin) }}" class="form-control" /></div>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ $author->is_active ? 'checked' : '' }} />
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Author</button>
                <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" onsubmit="return confirm('Delete?')" class="ms-auto">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
