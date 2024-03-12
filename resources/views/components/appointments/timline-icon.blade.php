@props([
'status'
])
<i class="fas fa-handshake
@switch($status)
    @case('done')
        bg-success
        @break
    @case('appointed')
        bg-warning
        @break
    @case('expired')
        bg-danger
        @break
@endswitch"></i>
