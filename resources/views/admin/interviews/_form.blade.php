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
    @if($interview?->image)<div class="mb-2"><img src="{{ asset('storage/'.$interview->image) }}" height="80" class="rounded" /></div>@endif
    <input type="file" name="image" class="form-control" accept="image/*" />
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
