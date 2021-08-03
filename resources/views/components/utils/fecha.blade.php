@php
    $dt = Carbon\Carbon::parse($fecha)->format('d-m-Y');
@endphp

<span class="text-secondary">{{ $dt }}</span>