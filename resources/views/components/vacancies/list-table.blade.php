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
        <th style="width: 25%" class="text-center">
            Последнее назначение
        </th>
        <th style="width: 8%" class="text-center">
            В избранном
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
                    <x-vacancies.status-badge :status="$vacancy->status"/>
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
                    @if($vacancy->lastAppointment())
                        <a href="{{ route('appointments.show', [$vacancy->lastAppointment()->id]) }}">{{ $vacancy->lastAppointment()->title }}</a>
                        <x-appointments.status-badge :status="$vacancy->lastAppointment()->status"/>
                    @endif
                </td>
                <td class="text-center">
                    <span class="{{ $vacancy->is_favorite ? 'text-warning': 'text-gray'}}"><i class="fas fa-star"></i>
                    </span>
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
