
<form method="post" action="{{ route('people.update', [$person->id]) }}">
    @include('people.includes.form-fields')
</form>
