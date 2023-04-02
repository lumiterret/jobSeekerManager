@props([
    'active'
])
<span
    class="badge
    @if($active === 'active')
        badge-success
    @else
        badge-secondary
    @endif">
    {{ $active }}
</span>
