@props([
    'status'
])
<span
    class="badge
    @switch($status)
    @case('done')
        badge-success
    @break
    @case('appointed')
        badge-warning
    @break
    @case('expired')
        badge-danger
    @break
    @endswitch">
    {{ $status }}
</span>
