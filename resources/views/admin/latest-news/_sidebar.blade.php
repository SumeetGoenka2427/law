<div class="card mb-3">
    <div class="card-header fw-semibold">Publish Settings</div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                @foreach(['draft','published','archived'] as $s)
                <option value="{{ $s }}" {{ old('status', $latestNews?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Publish Date</label>
            <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', $latestNews?->published_at?->format('Y-m-d\TH:i')) }}" />
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" {{ old('is_featured', $latestNews?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="is_breaking" value="1" class="form-check-input" id="is_breaking" {{ old('is_breaking', $latestNews?->is_breaking) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_breaking">Breaking News</label>
        </div>
    </div>
</div>
@if($latestNews)
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('admin.latest-news.destroy', $latestNews) }}" onsubmit="return confirm('Delete?')">
        @csrf @method('DELETE')
        <button class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-trash"></i> Delete</button>
    </form>
</div></div>
@endif
