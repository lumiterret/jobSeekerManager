<div class="row">
    <div class="col-12 col-md-12 col-lg-8">
        <div class="row"> {{-- Контакты --}}
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Полное имя
                        </th>
                        <th>
                            Контактные данные
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($vacancy->people))
                        @foreach($vacancy->people as $person)
                            {{-- Список контактов --}}
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('people.show', [$person->id]) }}">
                                        {{ $person->full_name }}
                                    </a>
                                    <p class="text-muted">
                                        {{ $person->position }}
                                    </p>
                                </td>
                                <td>
                                    @include('contacts.index')
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">
                                Добавьте контакты для отображения
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div> {{-- /Контакты --}}
        <div class="row"> {{-- Описание вакансии --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @markdown{{ $vacancy->description }}@endmarkdown
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
        <div class="card card-danger card-outline"> {{-- Статус --}}
            <div class="card-header">
                <h3 class="card-title">Сменить статус</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('vacancies.status-change') }}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </div>
                                <select
                                    name="status"
                                    required="required"
                                    class="custom-select">
                                    @foreach ($vacancy->statuses() as $status)
                                        <option value="{{ $status }}"
                                                @if($status == $vacancy->status)
                                                    selected
                                            @endif
                                        >
                                            {{ __(ucfirst($status)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> {{-- /Статус--}}
        <div class="card card-primary card-outline collapsed-card"> {{-- Добавление контактов --}}
            <div class="card-header">
                <h3 class="card-title">Добавить контакты</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <form method="post" action="{{ route('vacancies.assign-people', $vacancy->id) }}">
                            @csrf
                            <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                            <div class="form-row mb-3">
                                <select class="form-control"  name="people[]" id="people" multiple>
                                    @foreach($people as $person)
                                        <option value="{{$person->id}}" @if(in_array($person->id, $peopleAttached))selected @endif>
                                            {{ $person->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> {{-- /Добавление контактов --}}
        <div class="card card-primary card-outline collapsed-card"> {{-- Назначение встречи --}}
            <div class="card-header">
                <h3 class="card-title">Назначить встречу</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('vacancies.appointment-create') }}">
                    @csrf
                    <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                    @include('appointments.includes.form-fields')
                </form>
            </div>
        </div> {{-- /Назначение встречи--}}
        <div class="card card-primary card-outline collapsed-card">{{-- Таймлайн встреч --}}
            <div class="card-header">
                <h3 class="card-title">История встреч</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @include('vacancies.includes.show-tabs.timeline')
            </div>
        </div>{{-- Таймлайн встреч --}}
    </div>
</div>

<script>
    window.addEventListener("load", function() {
        $('#people').select2({
            ajax: {
                url: '/people/search',
                dataType: 'json',
                type: "get",
                data: function (params) {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function (data) {
                    return { results: data };
                },
                error: function (jqXHR, exception) {
                    if (jqXHR.status === 0) {
                        console.log('Not connect. Verify Network.');
                    } else if (jqXHR.status == 404) {
                        console.log('Requested page not found (404).');
                    } else if (jqXHR.status == 500) {
                        console.log('Internal Server Error (500).');
                    } else if (exception === 'parsererror') {
                        console.log('Requested JSON parse failed.');
                    } else if (exception === 'timeout') {
                        console.log('Time out error.');
                    } else if (exception === 'abort') {
                        console.log('Ajax request aborted.');
                    } else {
                        console.log('Uncaught Error. ' + jqXHR.responseText);
                    }
                }
            },
            minimumInputLength: 3,
            placeholder: 'Контактные лица',
            width: '100%'
        });
    })
</script>
