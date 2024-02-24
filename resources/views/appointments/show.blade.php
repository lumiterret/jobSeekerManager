@extends('layouts.base')

@section('title', 'Назначение - ' . $appointment->title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$appointment->title}}  - <a href="{{ route('vacancies.show', [$appointment->vacancy->id])}}">{{ $appointment->vacancy->title}}</a>
                        <x-appointments.status-badge :status="$appointment['status']"/>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Обзор
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('appointments.index') }}">
                                Назначения
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Просмотр Назначения
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
                                    <a class="nav-link active" href="#description" data-toggle="tab">Описание</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#edit-appointment" data-toggle="tab">Редактировать</a>
                                </li>
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="description">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-8">
                                            @markdown{{ $appointment->description }}@endmarkdown
                                            @if($appointment->meeting)
                                                <a href="{{$appointment->meeting}}">{{$appointment->meeting}}</a>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-4">
                                            {{-- Статус --}}
                                            @include('appointments.includes.status-form')
                                        </div>
                                    </div>
                                </div>{{-- /.tab-pane Описание Назначения--}}
                                <div class="tab-pane" id="edit-appointment">
                                    <form method="post" action="{{ route('appointments.update', [$appointment->id]) }}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="vacancy_id" value="{{ $appointment->vacancy->id }}">
                                        @include('appointments.includes.form-fields')
                                    </form>
                                </div>{{-- /.tab-pane --}}
                            </div>{{-- /.tab-content --}}
                        </div> {{-- /.card-body --}}
                    </div> {{-- /.card --}}
                </div> {{-- /.col --}}
            </div>
        </div>
    </section>
@endsection

