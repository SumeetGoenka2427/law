<div class="mb-3">
    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', $judgment?->title) }}" class="form-control @error('title') is-invalid @enderror" required />
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Court <span class="text-danger">*</span></label>
        <input type="text" name="court" value="{{ old('court', $judgment?->court) }}" class="form-control @error('court') is-invalid @enderror" required />
        @error('court')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Case Number</label>
        <input type="text" name="case_number" value="{{ old('case_number', $judgment?->case_number) }}" class="form-control" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Bench</label>
        <input type="text" name="bench" value="{{ old('bench', $judgment?->bench) }}" class="form-control" placeholder="e.g. Justices Oka & Agarwal" />
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Date Decided</label>
        <input type="date" name="decided_at" value="{{ old('decided_at', $judgment?->decided_at?->format('Y-m-d')) }}" class="form-control" />
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Category</label>
    <select name="category_id" class="form-select">
        <option value="">— Select Category —</option>
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ old('category_id', $judgment?->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Excerpt / Headnote</label>
    <textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt', $judgment?->excerpt) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Full Judgment Text <span class="text-danger">*</span></label>
    <textarea name="content" rows="14" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $judgment?->content) }}</textarea>
    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">PDF File</label>
    @if($judgment?->pdf_file)
    <div class="mb-2"><a href="{{ asset('storage/'.$judgment->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-file-pdf"></i> View Current PDF</a></div>
    @endif
    <input type="file" name="pdf_file" class="form-control" accept=".pdf" />
</div>

<hr />
<h6 class="fw-semibold">SEO</h6>
<div class="mb-3">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $judgment?->meta_title) }}" class="form-control" />
</div>
<div class="mb-3">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $judgment?->meta_description) }}</textarea>
</div>

<hr />
<h6 class="fw-semibold">Publish Settings</h6>
<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach(['draft','published','archived'] as $s)
            <option value="{{ $s }}" {{ old('status', $judgment?->status ?? 'draft') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', $judgment?->published_at?->format('Y-m-d\TH:i')) }}" />
    </div>
    <div class="col-md-4 d-flex align-items-end pb-1">
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                {{ old('is_featured', $judgment?->is_featured) ? 'checked' : '' }} />
            <label class="form-check-label" for="is_featured">Featured</label>
        </div>
    </div>
</div>
