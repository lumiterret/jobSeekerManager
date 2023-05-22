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
                    <div class="card card-primary card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#browse-profile" data-toggle="tab">Профиль</a>
                                </li>
                                @if(user()->is_admin || $person->user_id === user()->id)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#edit-profile" data-toggle="tab">Редактировать</a>
                                    </li>
                                @endif
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="browse-profile">
                                    {{-- Профиль --}}
                                    @include('people.includes.show-tabs.browse-tab')
                                </div>{{-- /.tab-pane Профиль--}}
                                @if(user()->is_admin || $person->user_id === user()->id)
                                    <div class="tab-pane" id="edit-profile">
                                        @include('people.includes.show-tabs.edit-tab')
                                    </div>{{-- /.tab-pane --}}
                                @endif
                            </div>{{-- /.tab-content --}}
                        </div>
                        {{-- /.card-body --}}
                    </div>
                    {{-- /.card --}}
                </div>{{-- /.col --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="card-title">Вакансии</h3>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="vacancy">
                                    {{-- Вакансии --}}
                                    <x-vacancies.list-table :vacancies="$vacancies"/>
                                </div>{{-- /.tab-pane Вакансии--}}
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

