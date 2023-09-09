@extends('layouts.base')

@section('title', 'Просмотр вакансии - ' . $vacancy->title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{$vacancy->title}} -
                        @if($vacancy->employer)
                            <a href="{{route('employers.show', [$vacancy->employer->id])}}">
                                {{ $vacancy->employer->title }}
                            </a>
                        @endif <x-vacancies.status-badge :status="$vacancy['status']"/></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Обзор
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('vacancies.index') }}">
                                Вакансии
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Просмотр
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#vacancy-show" data-toggle="tab">
                                        Просмотр
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#timeline" data-toggle="tab">
                                        Назначения
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#vacancy-edit" data-toggle="tab">
                                        Редактировать
                                    </a>
                                </li>
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="vacancy-show">
                                    {{-- Просмотр --}}
                                    @include('vacancies.includes.show-tabs.show')
                                </div>{{-- /.tab-pane Просмотр --}}
                                <div class="tab-pane" id="timeline">
                                    {{-- События --}}
                                    @include('vacancies.includes.show-tabs.timeline')
                                </div>{{-- /.tab-pane События--}}
                                <div class="tab-pane" id="vacancy-edit">
                                    {{-- Редактирование --}}
                                    @include('vacancies.includes.show-tabs.edit')
                                </div>{{-- /.tab-pane Редактирование--}}
                            </div>{{-- /.tab-content --}}
                        </div> {{-- /.card-body --}}
                    </div> {{-- /.card --}}
                </div> {{-- /.col --}}
            </div>
        </div>
    </section>
@endsection
