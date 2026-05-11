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
    @if($article?->image)
    <div class="mb-2"><img src="{{ asset('storage/'.$article->image) }}" height="80" class="rounded" /></div>
    @endif
    <input type="file" name="image" class="form-control" accept="image/*" />
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
