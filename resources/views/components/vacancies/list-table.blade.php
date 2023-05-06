@props([
    'vacancies'
])


<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 25%">
            Название вакансии
        </th>
        <th style="width: 25%">
            Компания
        </th>
        <th style="width: 8%" class="text-center">
            Статус
        </th>
    </tr>
    </thead>
    <tbody>
    @if(count($vacancies))
        @foreach($vacancies as $vacancy)
            <tr>
                <td>
                    <a href="{{ route('vacancies.show', [$vacancy->id]) }}">
                        {{ $vacancy->title }}
                    </a>
                    <br>
                    <small>
                        {{ $vacancy->created_at }}
                    </small>
                </td>
                <td>
                    @if($vacancy->employer)
                    <a href="{{ route('employers.show', [$vacancy->employer->id]) }}">
                        {{ $vacancy->employer->title }}
                    </a>
                    @endif
                </td>
                <td>
                    <x-vacancies.status-badge :status="$vacancy->status"/>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4">
                Ничего не найдено
            </td>
        </tr>
    @endif
    </tbody>
</table>
