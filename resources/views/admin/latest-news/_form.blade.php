<div class="mb-3">
    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', $latestNews?->title) }}"
        class="form-control @error('title') is-invalid @enderror" required />
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <select name="category_id" class="form-select">
            <option value="">— Select Category —</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ old('category_id', $latestNews?->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Author</label>
        <select name="author_id" class="form-select">
            <option value="">— Select Author —</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}"
                    {{ old('author_id', $latestNews?->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Excerpt</label>
    <textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt', $latestNews?->excerpt) }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Content <span class="text-danger">*</span></label>
    <textarea name="content" rows="12" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $latestNews?->content) }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Featured Image</label>
    @if ($latestNews?->image)
        <div class="mb-2"><img src="{{ asset('storage/' . $latestNews->image) }}" height="80" class="rounded" />
        </div>
    @endif
    <input type="file" name="image" class="form-control" accept="image/*" />
</div>
<div class="card-body">
    <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select">
            @foreach (['draft', 'published', 'archived'] as $s)
                <option value="{{ $s }}"
                    {{ old('status', $latestNews?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', $latestNews?->published_at?->format('Y-m-d\TH:i')) }}" />
    </div>
    <div class="form-check mb-2">
        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
            {{ old('is_featured', $latestNews?->is_featured) ? 'checked' : '' }} />
        <label class="form-check-label" for="is_featured">Featured</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_breaking" value="1" class="form-check-input" id="is_breaking"
            {{ old('is_breaking', $latestNews?->is_breaking) ? 'checked' : '' }} />
        <label class="form-check-label" for="is_breaking">Breaking News</label>
    </div>
</div>
<hr />
<h6 class="fw-semibold">SEO</h6>
<div class="mb-3"><label class="form-label">Meta Title</label><input type="text" name="meta_title"
        value="{{ old('meta_title', $latestNews?->meta_title) }}" class="form-control" /></div>
<div class="mb-3"><label class="form-label">Meta Description</label>
    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $latestNews?->meta_description) }}</textarea>
</div>
