@extends('layouts.base')

@section('title', 'Вакансии')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Вакансии</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item active">Вакансии</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Фильтры</h3>

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
                    <div class="col col-sm-3">
                        <form method="get" action="{{ route('vacancies.index')}}">
                            <div class="form-group mb-3">
                                <label class="col-form-label-sm" for="status">Статус</label>
                                <select class="form-control" id="status" name="status[]" multiple>
                                    <option value="" selected disabled></option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}">
                                            {{ __(ucfirst($status)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success" type="submit">Поиск</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Вакансии</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('vacancies.create') }}">
                        <i class="fas fa-plus-circle">
                        </i>
                        Добавить новую
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <x-vacancies.list-table :vacancies="$vacancies"/>
            </div>
            <div class="card-footer">
               {{-- @if($vacancies->count())
                {{ $vacancies->links() }}
                @endif--}}
            </div>
        </div>

    </section>
@endsection
