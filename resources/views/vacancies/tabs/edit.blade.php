<div class="row">
    <div class="col">
        <form method="post" action="{{ route('vacancies.update', [$vacancy->id]) }}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $vacancy->id }}">
            @include('vacancies.form-fields')
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
</div>{{-- /.row --}}
