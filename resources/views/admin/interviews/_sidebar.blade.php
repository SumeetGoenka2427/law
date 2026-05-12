@if($interview?->image)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Featured Image</div>
    <div class="card-body text-center p-2">
        <img src="{{ asset('storage/'.$interview->image) }}" class="img-fluid rounded" alt="" />
    </div>
</div>
@endif

@if($interview)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Interview Info</div>
    <div class="card-body" style="font-size:.85rem">
        <div class="mb-2">
            <div class="text-muted small">Status</div>
            @include('admin.partials.status-badge', ['status' => $interview->status])
        </div>
        @if($interview->is_featured)
        <div class="mb-2"><span class="badge bg-warning text-dark">⭐ Featured</span></div>
        @endif
        @if($interview->interviewee_name)
        <div class="mb-2">
            <div class="text-muted small">Interviewee</div>
            <div>{{ $interview->interviewee_name }}</div>
        </div>
        @endif
        @if($interview->author)
        <div class="mb-2">
            <div class="text-muted small">Conducted By</div>
            <div>{{ $interview->author->name }}</div>
        </div>
        @endif
        <div class="mb-2">
            <div class="text-muted small">Created</div>
            <div>{{ $interview->created_at->format('d M Y, H:i') }}</div>
        </div>
        <div>
            <div class="text-muted small">Updated</div>
            <div>{{ $interview->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
</div>
@else
<div class="card mb-3">
    <div class="card-body text-muted small">
        <i class="bi bi-info-circle"></i> Interview info will appear here after saving.
    </div>
</div>
@endif
