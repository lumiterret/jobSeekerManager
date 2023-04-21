@extends('layouts.base')

@section('title', 'Контактное лицо - ' . $person->full_name)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Профиль</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Контактные лица</a></li>
                        <li class="breadcrumb-item active">Просмотр профиля</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    {{-- Profile Image --}}
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col col-md-3">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{ Vite::asset('resources/img/avatar2.png') }}"
                                             alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">
                                        {{ $person->full_name }}
                                    </h3>
                                    <p class="text-muted text-center">
                                        {{ $person->position }}
                                    </p>
                                    <a href="#" id="toggle-button" class="btn btn-primary btn-block">
                                        <b>Добавить контактные данные</b>
                                    </a>
                                </div>
                                <div class="col col-md-9">
                                    @include('contacts.index')
                                    <div class="card card-primary card-outline d-none mt-3" id="add-info">
                                        <div class="card-body">
                                            @include('contacts.form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /.card-body --}}
                    </div>
                    {{-- /.card --}}
                </div>{{-- /.col --}}
            </div>
            <div class="row">
                <div class="col">
                    {{-- Description --}}
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            Заметка
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <p class="text-muted">
                                Приветствую меня зовут "Name" - я представляю компанию "Conpany name"
                            </p>
                        </div> {{-- /.card-body --}}
                    </div>{{-- /Description --}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#vacancy" data-toggle="tab">Вакансии</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#edit-profile" data-toggle="tab">Редактировать</a>
                                </li>
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="vacancy">
                                    {{-- Вакансии --}}
                                    <x-vacancies.list-table :vacancies="$vacancies"/>
                                </div>{{-- /.tab-pane Вакансии--}}
                                <div class="tab-pane" id="edit-profile">
                                    <form method="post" action="{{ route('people.update', [$person->id]) }}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $person->id }}">
                                        @include('people.form-fields')
                                        <button type="submit" class="btn btn-success">Изменить</button>
                                    </form>
                                </div>{{-- /.tab-pane --}}
                            </div>{{-- /.tab-content --}}
                        </div> {{-- /.card-body --}}
                    </div> {{-- /.card --}}
                </div> {{-- /.col --}}
            </div>
        </div>
    </section>
    <script>

        window.addEventListener("load", function() {
            $("#toggle-button").click(function() {
                $("#add-info").toggleClass('d-none');
            });
        })
    </script>
@endsection

