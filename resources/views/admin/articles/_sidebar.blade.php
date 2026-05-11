<div class="card mb-3">
    <div class="card-header fw-semibold">Publish Settings</div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                @foreach(['draft','published','archived'] as $s)
                <option value="{{ $s }}" {{ old('status', $article?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Publish Date</label>
            <input type="datetime-local" name="published_at" class="form-control"
                value="{{ old('published_at', $article?->published_at?->format('Y-m-d\TH:i')) }}" />
        </div>
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                {{ old('is_featured', $article?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured Article</label>
        </div>
    </div>
</div>

@if($article)
<div class="card">
    <div class="card-header fw-semibold text-danger">Danger Zone</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Permanently delete this article?')">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-trash"></i> Delete Article</button>
        </form>
    </div>
</div>
@endif
