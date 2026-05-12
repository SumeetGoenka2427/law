<div class="mb-3">
    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', $opinion?->title) }}" class="form-control @error('title') is-invalid @enderror" required />
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $opinion?->slug) }}" class="form-control" placeholder="Auto-generated from title" />
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Author</label>
    <select name="author_id" class="form-select">
        <option value="">— Select Author —</option>
        @foreach($authors as $a)
        <option value="{{ $a->id }}" {{ old('author_id', $opinion?->author_id) == $a->id ? 'selected' : '' }}>{{ $a->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Excerpt</label>
    <textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt', $opinion?->excerpt) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Content <span class="text-danger">*</span></label>
    <textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $opinion?->content) }}</textarea>
    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Featured Image</label>
    <x-admin.drag-upload name="image" :existing="$opinion?->image" />
</div>

<hr />
<h6 class="fw-semibold">SEO</h6>
<div class="mb-3">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $opinion?->meta_title) }}" class="form-control" />
</div>
<div class="mb-3">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $opinion?->meta_description) }}</textarea>
</div>

<hr />
<h6 class="fw-semibold">Publish Settings</h6>
<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach(['draft','published','archived'] as $s)
            <option value="{{ $s }}" {{ old('status', $opinion?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', $opinion?->published_at?->format('Y-m-d\TH:i')) }}" />
    </div>
    <div class="col-md-4 d-flex align-items-end pb-1">
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                {{ old('is_featured', $opinion?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured</label>
        </div>
    </div>
</div>
