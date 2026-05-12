<div class="mb-3">
    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', $interview?->title) }}" class="form-control @error('title') is-invalid @enderror" required />
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Interviewee Name <span class="text-danger">*</span></label>
        <input type="text" name="interviewee_name" value="{{ old('interviewee_name', $interview?->interviewee_name) }}" class="form-control @error('interviewee_name') is-invalid @enderror" required />
        @error('interviewee_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Interviewee Designation</label>
        <input type="text" name="interviewee_designation" value="{{ old('interviewee_designation', $interview?->interviewee_designation) }}" class="form-control" />
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Conducted By (Author)</label>
    <select name="author_id" class="form-select">
        <option value="">— Select Author —</option>
        @foreach($authors as $author)
        <option value="{{ $author->id }}" {{ old('author_id', $interview?->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Excerpt</label>
    <textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt', $interview?->excerpt) }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Content <span class="text-danger">*</span></label>
    <textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $interview?->content) }}</textarea>
    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Featured Image</label>
    <x-admin.drag-upload name="image" :existing="$interview?->image" />
</div>
<hr />
<h6 class="fw-semibold">SEO</h6>
<div class="mb-3">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $interview?->meta_title) }}" class="form-control" />
</div>
<div class="mb-3">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $interview?->meta_description) }}</textarea>
</div>

<hr />
<h6 class="fw-semibold">Publish Settings</h6>
<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach(['draft','published','archived'] as $s)
            <option value="{{ $s }}" {{ old('status', $interview?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', $interview?->published_at?->format('Y-m-d\TH:i')) }}" />
    </div>
    <div class="col-md-4 d-flex align-items-end pb-1">
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                {{ old('is_featured', $interview?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured</label>
        </div>
    </div>
</div>
