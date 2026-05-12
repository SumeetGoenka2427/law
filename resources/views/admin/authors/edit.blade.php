@extends('admin.layouts.app')
@section('title', 'Edit Author')
@section('page-title', 'Edit Author')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card" style="max-width:100%">
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
                            <x-admin.drag-upload name="image" :existing="$author->image" />
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @if($author->image)
        <div class="card mb-3">
            <div class="card-header fw-semibold small">Author Photo</div>
            <div class="card-body text-center p-2">
                <img src="{{ asset('storage/'.$author->image) }}" class="img-fluid rounded-circle" style="max-height:160px;max-width:160px" alt="" />
            </div>
        </div>
        @endif
        <div class="card mb-3">
            <div class="card-header fw-semibold small">Author Info</div>
            <div class="card-body" style="font-size:.85rem">
                @if($author->designation)
                <div class="mb-2">
                    <div class="text-muted small">Designation</div>
                    <div>{{ $author->designation }}</div>
                </div>
                @endif
                <div class="mb-2">
                    <div class="text-muted small">Status</div>
                    <span class="badge bg-{{ $author->is_active ? 'success' : 'secondary' }}">{{ $author->is_active ? 'Active' : 'Inactive' }}</span>
                </div>
                <div class="mb-2">
                    <div class="text-muted small">Created</div>
                    <div>{{ $author->created_at->format('d M Y') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card border-danger">
            <div class="card-header text-danger fw-semibold small">Danger Zone</div>
            <div class="card-body d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="fw-semibold small">Delete this author</div>
                    <div class="text-muted" style="font-size:.8rem">This action cannot be undone.</div>
                </div>
                <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" onsubmit="return confirm('Permanently delete this author?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
