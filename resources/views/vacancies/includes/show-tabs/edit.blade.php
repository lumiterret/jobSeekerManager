<div class="row">
    <div class="col">
        <form method="post" action="{{ route('vacancies.update', [$vacancy->id]) }}">
            @include('vacancies.includes.form-fields')
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
</div>{{-- /.row --}}
