<div class="row">
    <div class="col">
        <form method="post" action="{{ route('users.update', [$user->id]) }}">
            @include('users.includes.form-fields')
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
</div>{{-- /.row --}}
