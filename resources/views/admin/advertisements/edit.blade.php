@extends('admin.layouts.app')
@section('title', 'Edit Advertisement')
@section('page-title', 'Edit Advertisement')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.alerts')
                <form method="POST" action="{{ route('admin.advertisements.update', $advertisement) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6"><label class="form-label fw-semibold">Title <span class="text-danger">*</span></label><input type="text" name="title" value="{{ old('title', $advertisement->title) }}" class="form-control" required /></div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Position</label>
                            <select name="position" class="form-select" required>
                                @foreach(['leaderboard','sidebar-top','sidebar-mid','sidebar-bottom','in-article','footer'] as $p)
                                <option value="{{ $p }}" {{ old('position', $advertisement->position) == $p ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $p)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"><label class="form-label">Size</label><input type="text" name="size" value="{{ old('size', $advertisement->size) }}" class="form-control" /></div>
                        <div class="col-md-6"><label class="form-label">Click URL</label><input type="url" name="url" value="{{ old('url', $advertisement->url) }}" class="form-control" /></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Image</label>
                        <x-admin.drag-upload name="image" :existing="$advertisement->image" />
                    </div>
                    <div class="mb-3"><label class="form-label">Embed Code</label><textarea name="code" rows="3" class="form-control">{{ old('code', $advertisement->code) }}</textarea></div>
                    <div class="row mb-3">
                        <div class="col-md-6"><label class="form-label">Start</label><input type="datetime-local" name="starts_at" value="{{ old('starts_at', $advertisement->starts_at?->format('Y-m-d\TH:i')) }}" class="form-control" /></div>
                        <div class="col-md-6"><label class="form-label">End</label><input type="datetime-local" name="ends_at" value="{{ old('ends_at', $advertisement->ends_at?->format('Y-m-d\TH:i')) }}" class="form-control" /></div>
                    </div>
                    <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ $advertisement->is_active ? 'checked' : '' }} /><label class="form-check-label" for="is_active">Active</label></div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.advertisements.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @if($advertisement->image)
        <div class="card mb-3">
            <div class="card-header fw-semibold small">Ad Preview</div>
            <div class="card-body text-center p-2">
                <img src="{{ asset('storage/'.$advertisement->image) }}" class="img-fluid rounded" alt="" />
            </div>
        </div>
        @endif
        <div class="card mb-3">
            <div class="card-header fw-semibold small">Ad Info</div>
            <div class="card-body" style="font-size:.85rem">
                <div class="mb-2">
                    <div class="text-muted small">Status</div>
                    <span class="badge bg-{{ $advertisement->is_active ? 'success' : 'secondary' }}">{{ $advertisement->is_active ? 'Active' : 'Inactive' }}</span>
                </div>
                <div class="mb-2">
                    <div class="text-muted small">Position</div>
                    <span class="badge bg-secondary">{{ $advertisement->position }}</span>
                </div>
                @if($advertisement->size)
                <div class="mb-2">
                    <div class="text-muted small">Size</div>
                    <div>{{ $advertisement->size }}</div>
                </div>
                @endif
                @if($advertisement->starts_at)
                <div class="mb-2">
                    <div class="text-muted small">Starts</div>
                    <div>{{ $advertisement->starts_at->format('d M Y') }}</div>
                </div>
                @endif
                @if($advertisement->ends_at)
                <div class="mb-2">
                    <div class="text-muted small">Expires</div>
                    <div>{{ $advertisement->ends_at->format('d M Y') }}</div>
                </div>
                @endif
                <div>
                    <div class="text-muted small">Updated</div>
                    <div>{{ $advertisement->updated_at->format('d M Y, H:i') }}</div>
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
                    <div class="fw-semibold small">Delete this advertisement</div>
                    <div class="text-muted" style="font-size:.8rem">This action cannot be undone.</div>
                </div>
                <form method="POST" action="{{ route('admin.advertisements.destroy', $advertisement) }}" onsubmit="return confirm('Permanently delete this advertisement?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
