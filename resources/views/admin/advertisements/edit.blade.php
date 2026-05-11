@extends('admin.layouts.app')
@section('title', 'Edit Advertisement')
@section('page-title', 'Edit Advertisement')

@section('content')
<div class="card" style="max-width:700px">
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
                @if($advertisement->image)<div class="mb-2"><img src="{{ asset('storage/'.$advertisement->image) }}" height="60" /></div>@endif
                <input type="file" name="image" class="form-control" accept="image/*" />
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
                <form method="POST" action="{{ route('admin.advertisements.destroy', $advertisement) }}" onsubmit="return confirm('Delete?')" class="ms-auto">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
