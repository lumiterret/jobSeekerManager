<form method="post" action="{{ route('contact.destroy', [$contact->id]) }}">
    @csrf
    @method('delete')
    <button class="btn btn-xs btn-outline-danger float-right"><i class="fas fa-trash-alt"></i></button>
</form>
