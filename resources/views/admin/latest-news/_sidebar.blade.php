@if($latestNews?->image)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Featured Image</div>
    <div class="card-body text-center p-2">
        <img src="{{ asset('storage/'.$latestNews->image) }}" class="img-fluid rounded" alt="" />
    </div>
</div>
@endif

@if($latestNews)
<div class="card mb-3">
    <div class="card-header fw-semibold small">News Info</div>
    <div class="card-body" style="font-size:.85rem">
        <div class="mb-2">
            <div class="text-muted small">Status</div>
            @include('admin.partials.status-badge', ['status' => $latestNews->status])
        </div>
        @if($latestNews->is_featured)
        <div class="mb-2"><span class="badge bg-warning text-dark">⭐ Featured</span></div>
        @endif
        @if($latestNews->is_breaking)
        <div class="mb-2"><span class="badge bg-danger">🔴 Breaking</span></div>
        @endif
        @if($latestNews->category)
        <div class="mb-2">
            <div class="text-muted small">Category</div>
            <div>{{ $latestNews->category->name }}</div>
        </div>
        @endif
        @if($latestNews->author)
        <div class="mb-2">
            <div class="text-muted small">Author</div>
            <div>{{ $latestNews->author->name }}</div>
        </div>
        @endif
        <div class="mb-2">
            <div class="text-muted small">Created</div>
            <div>{{ $latestNews->created_at->format('d M Y, H:i') }}</div>
        </div>
        <div>
            <div class="text-muted small">Updated</div>
            <div>{{ $latestNews->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
</div>
@else
<div class="card mb-3">
    <div class="card-body text-muted small">
        <i class="bi bi-info-circle"></i> News info will appear here after saving.
    </div>
</div>
@endif
