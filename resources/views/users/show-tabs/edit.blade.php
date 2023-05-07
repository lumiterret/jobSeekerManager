<div class="row">
    <div class="col">
        <form method="post" action="{{ route('users.update', [$user->id]) }}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $user->id }}">
            @include('users.form-fields')
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
</div>{{-- /.row --}}
