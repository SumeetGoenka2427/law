@if($opinion?->image)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Featured Image</div>
    <div class="card-body text-center p-2">
        <img src="{{ asset('storage/'.$opinion->image) }}" class="img-fluid rounded" alt="" />
    </div>
</div>
@endif

@if($opinion)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Opinion Info</div>
    <div class="card-body" style="font-size:.85rem">
        <div class="mb-2">
            <div class="text-muted small">Status</div>
            @include('admin.partials.status-badge', ['status' => $opinion->status])
        </div>
        @if($opinion->is_featured)
        <div class="mb-2"><span class="badge bg-warning text-dark">⭐ Featured</span></div>
        @endif
        @if($opinion->author)
        <div class="mb-2">
            <div class="text-muted small">Author</div>
            <div>{{ $opinion->author->name }}</div>
        </div>
        @endif
        <div class="mb-2">
            <div class="text-muted small">Created</div>
            <div>{{ $opinion->created_at->format('d M Y, H:i') }}</div>
        </div>
        <div>
            <div class="text-muted small">Updated</div>
            <div>{{ $opinion->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
</div>
@else
<div class="card mb-3">
    <div class="card-body text-muted small">
        <i class="bi bi-info-circle"></i> Opinion info will appear here after saving.
    </div>
</div>
@endif
