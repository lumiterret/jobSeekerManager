@extends('layouts.base')

@section('title', 'Настройки - редактирование крона')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование крона</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Обзор</a>
                        </li>
                        <li class="breadcrumb-item">
                            Управление
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('cron-jobs.index') }}">Кроны</a>
                        </li>
                        <li class="breadcrumb-item active">Редактирование</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        {{-- кнопки --}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('cron-jobs.update', [$cronJob->id]) }}" method="post">
                        @include('cron-jobs.includes.form-fields')
                    </form>
                    <script>
                        window.addEventListener("load", function() {
                            $("#toggle-button").click(function() {
                                $("#command").removeAttr('disabled');
                            });
                        })
                    </script>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </section>
@endsection
