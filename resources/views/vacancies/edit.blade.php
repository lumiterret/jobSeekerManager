@extends('layouts.base')

@section('title', 'Редактирование вакансии -'.$vacancy->title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><a href="{{ route('vacancies.show', [$vacancy->id]) }}">{{ $vacancy->title }}</a></h1>
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
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <form method="post" action="{{ route('vacancies.update', [$vacancy->id]) }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $vacancy->id }}">
                            @include('vacancies.form-fields')
                            <button type="submit" class="btn btn-success">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>{{-- /.row --}}
            <div class="row">
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Контактные лица
                        </div>
                        <div class="card-body">
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
            </div>
        </div>
    </section>
@endsection

