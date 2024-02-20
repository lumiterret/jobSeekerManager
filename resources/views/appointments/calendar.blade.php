@extends('layouts.base')

@section('title', 'Назначения')


@section('content')
    @vite(['resources/js/calendar.js'])

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Календарь</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Обзор</a></li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('appointments.index') }}">Назначения</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div id="calendar"><Calendar></Calendar></div>
    </section>
@endsection
