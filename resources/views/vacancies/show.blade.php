@extends('layouts.base')

@section('title', 'Обзор')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Просмотр</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vacancies.index') }}">Вакансии</a></li>
                        <li class="breadcrumb-item active">Просмотр</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{$vacancy->title}} <x-vacancies.status-badge :status="$vacancy->status"/>
                    </h3>

                    <div class="card-tools">
                        <a href="{{ route('vacancies.edit', [$vacancy->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Редактировать
                        </a>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Описание</h4>
                                    <div class="post" style="height: 80%">
                                        @markdown{{ $vacancy->description }}@endmarkdown
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
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
                                                        <option value=""></option>
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
                            <div class="card card-primary"> {{-- Компания --}}
                                <div class="card-header">
                                    <h3 class="card-title">Компания</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <b class="d-block text-center">
                                        @if($vacancy->employer)
                                        <a href="{{route('employers.show', [$vacancy->employer->id])}}">
                                            {{ $vacancy->employer->title }}
                                        </a>
                                        @endif
                                    </b>
                                </div>
                            </div> {{-- /Компания --}}
                        </div>
                    </div>
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
                    <div class="card card-primary card-outline collapsed-card mt-3"> {{-- Контакты --}}
                        <div class="card-header">
                            <h3 class="card-title">Добавить контакты</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('vacancies.assign-people', $vacancy->id) }}">
                                        @csrf
                                        <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                                        <div class="form-row mb-3">
                                            <select class="form-control"  name="people[]" id="people" multiple>
                                                @foreach($people as $person)
                                                    <option value="{{$person->id}}">{{ $person->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Добавить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> {{-- /Контакты --}}
                </div>
            </div>
        </div>
    </section>
@endsection

