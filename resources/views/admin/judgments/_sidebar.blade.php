@if($judgment)
<div class="card mb-3">
    <div class="card-header fw-semibold small">Judgment Info</div>
    <div class="card-body" style="font-size:.85rem">
        <div class="mb-2">
            <div class="text-muted small">Status</div>
            @include('admin.partials.status-badge', ['status' => $judgment->status])
        </div>
        @if($judgment->is_featured)
        <div class="mb-2"><span class="badge bg-warning text-dark">⭐ Featured</span></div>
        @endif
        @if($judgment->court)
        <div class="mb-2">
            <div class="text-muted small">Court</div>
            <div>{{ $judgment->court }}</div>
        </div>
        @endif
        @if($judgment->case_number)
        <div class="mb-2">
            <div class="text-muted small">Case Number</div>
            <div>{{ $judgment->case_number }}</div>
        </div>
        @endif
        @if($judgment->decided_at)
        <div class="mb-2">
            <div class="text-muted small">Date Decided</div>
            <div>{{ $judgment->decided_at->format('d M Y') }}</div>
        </div>
        @endif
        @if($judgment->pdf_file)
        <div class="mb-2">
            <div class="text-muted small">PDF</div>
            <a href="{{ asset('storage/'.$judgment->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-secondary w-100">
                <i class="bi bi-file-pdf"></i> View PDF
            </a>
        </div>
        @endif
        <div class="mb-2">
            <div class="text-muted small">Created</div>
            <div>{{ $judgment->created_at->format('d M Y, H:i') }}</div>
        </div>
        <div>
            <div class="text-muted small">Updated</div>
            <div>{{ $judgment->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
</div>
@else
<div class="card mb-3">
    <div class="card-body text-muted small">
        <i class="bi bi-info-circle"></i> Judgment info will appear here after saving.
    </div>
</div>
@endif
