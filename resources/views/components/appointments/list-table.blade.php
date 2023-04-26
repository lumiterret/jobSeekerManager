@props([
    'appointments'
])


<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 25%">
            Название встречи
        </th>
        <th style="width: 25%">
            Вакансия
        </th>
        <th style="width: 8%" class="text-center">
            Статус
        </th>
    </tr>
    </thead>
    <tbody>
    @if(count($appointments))
        @foreach($appointments as $appointment)
            <tr>
                <td>
                    <a href="{{ route('appointments.show', [$appointment->id]) }}">
                        {{ $appointment->title }}
                    </a>
                    <br>
                    <small>
                        {{ $appointment->date->format('d-m H:i') }}
                    </small>
                </td>
                <td>
                    @if($appointment->vacancy)
                        <a
                            class="md-3"
                            href="{{ route('vacancies.show', [$appointment->vacancy->id]) }}"
                        >
                            {{ $appointment->vacancy->title }}
                        </a>
                         -
                        <a
                            class=""
                            href="{{ route('employers.show', [$appointment->vacancy->employer->id]) }}"
                        >
                            {{ $appointment->vacancy->employer->title }}
                        </a>

                    @endif
                </td>
                <td>
                    <x-appointments.status-badge :status="$appointment->status"/>
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
