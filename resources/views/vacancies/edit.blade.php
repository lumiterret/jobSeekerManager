@extends('layouts.base')

@section('title', 'Редактирование вакансии -'.$vacancy->title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $vacancy->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vacancies.index') }}">Вакансии</a></li>
                        <li class="breadcrumb-item active">Редактирование</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary">
            <div class="card-body">
                @bind($vacancy)
                <x-form method="put" action="{{ route('vacancies.update', [$vacancy->id]) }}">
                    @include('vacancies.form-fields')
                    <button type="submit" class="btn btn-success">Изменить</button>
                </x-form>
                @endbind
            </div>
        </div>
    </section>
@endsection

