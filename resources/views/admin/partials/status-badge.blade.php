@php
$colors = ['draft'=>'secondary','published'=>'success','archived'=>'danger'];
@endphp
<span class="badge bg-{{ $colors[$status] ?? 'secondary' }}">{{ ucfirst($status) }}</span>
