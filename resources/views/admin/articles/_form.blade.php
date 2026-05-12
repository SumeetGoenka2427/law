<div class="mb-3">
    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', $article?->title) }}" class="form-control @error('title') is-invalid @enderror" required />
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $article?->slug) }}" class="form-control" placeholder="Auto-generated from title" />
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <select name="category_id" class="form-select">
            <option value="">— Select Category —</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id', $article?->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Author</label>
        <select name="author_id" class="form-select">
            <option value="">— Select Author —</option>
            @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ old('author_id', $article?->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Excerpt</label>
    <textarea name="excerpt" rows="2" class="form-control" maxlength="500" placeholder="Short summary...">{{ old('excerpt', $article?->excerpt) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Content <span class="text-danger">*</span></label>
    <textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $article?->content) }}</textarea>
    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Featured Image</label>
    <x-admin.drag-upload name="image" :existing="$article?->image" />
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Tags</label>
    <select name="tags[]" class="form-select" multiple>
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $article?->tags->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
        @endforeach
    </select>
    <small class="text-muted">Hold Ctrl / Cmd to select multiple</small>
</div>

<hr />
<h6 class="fw-semibold">SEO</h6>
<div class="mb-3">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $article?->meta_title) }}" class="form-control" />
</div>
<div class="mb-3">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $article?->meta_description) }}</textarea>
</div>

<hr />
<h6 class="fw-semibold">Publish Settings</h6>
<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach(['draft','published','archived'] as $s)
            <option value="{{ $s }}" {{ old('status', $article?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', $article?->published_at?->format('Y-m-d\TH:i')) }}" />
    </div>
    <div class="col-md-4 d-flex align-items-end pb-1">
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                {{ old('is_featured', $article?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured Article</label>
        </div>
    </div>
</div>
