@props([
    'name' => 'image',
    'existing' => null,
    'accept' => 'image/*',
])

<div class="du-wrap">
    {{-- Existing image preview --}}
    @if($existing)
    <div class="du-existing mb-2" id="du-existing-{{ $name }}">
        <img src="{{ asset('storage/'.$existing) }}" class="img-fluid rounded border" style="max-height:200px" alt="" />
        <div class="mt-2">
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="duRemoveExisting('{{ $name }}')">
                <i class="bi bi-x-circle"></i> Remove Image
            </button>
        </div>
    </div>
    <input type="hidden" name="remove_{{ $name }}" id="du-remove-{{ $name }}" value="0" />
    @else
    <input type="hidden" name="remove_{{ $name }}" id="du-remove-{{ $name }}" value="0" />
    @endif

    {{-- Drop zone --}}
    <div class="du-zone border rounded p-3 text-center"
        id="du-zone-{{ $name }}"
        style="cursor:pointer;border-style:dashed!important;"
        ondragover="event.preventDefault();this.classList.add('bg-light')"
        ondragleave="this.classList.remove('bg-light')"
        ondrop="duDrop(event,'{{ $name }}')"
        onclick="document.getElementById('du-input-{{ $name }}').click()">
        <div id="du-preview-wrap-{{ $name }}" class="d-none">
            <img id="du-preview-{{ $name }}" src="" class="img-fluid rounded mb-2" style="max-height:200px" alt="" />
            <div class="small text-muted" id="du-fname-{{ $name }}"></div>
        </div>
        <div id="du-placeholder-{{ $name }}">
            <i class="bi bi-cloud-upload fs-3 text-secondary d-block mb-1"></i>
            <div class="small text-muted">Drag & drop or <strong class="text-primary">click to upload</strong></div>
            <div class="text-muted" style="font-size:.75rem">{{ $accept }}</div>
        </div>
        <input type="file"
            name="{{ $name }}"
            id="du-input-{{ $name }}"
            accept="{{ $accept }}"
            class="d-none"
            onchange="duPreview(this,'{{ $name }}')" />
    </div>
</div>

@once
@push('scripts')
<script>
function duPreview(input, name) {
    if (!input.files || !input.files.length) return;
    var file = input.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('du-preview-' + name).src = e.target.result;
        document.getElementById('du-fname-' + name).textContent = file.name;
        document.getElementById('du-preview-wrap-' + name).classList.remove('d-none');
        document.getElementById('du-placeholder-' + name).classList.add('d-none');
    };
    reader.readAsDataURL(file);
}
function duDrop(e, name) {
    e.preventDefault();
    e.currentTarget.classList.remove('bg-light');
    var files = e.dataTransfer.files;
    if (files && files.length) {
        var input = document.getElementById('du-input-' + name);
        try {
            var dt = new DataTransfer();
            dt.items.add(files[0]);
            input.files = dt.files;
        } catch(ex) {}
        duPreview(input, name);
    }
}
function duRemoveExisting(name) {
    var el = document.getElementById('du-existing-' + name);
    if (el) el.style.display = 'none';
    var flag = document.getElementById('du-remove-' + name);
    if (flag) flag.value = '1';
}
</script>
@endpush
@endonce
