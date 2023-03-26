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

                <a class="btn btn-primary btn-sm" href="{{ route('vacancies.create') }}">
                    <i class="fas fa-plus-circle">
                    </i>
                    Добавить новую
                </a>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Вакансии</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 25%">
                            Компания
                        </th>
                        <th style="width: 25%">
                            Название вакансии
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                        <th style="width: 30%">
                            Действия
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($vacancies->count())
                            @foreach($vacancies as $vacancy)
                                <tr>
                                    <td>
                                        {{ $vacancy->id }}
                                    </td>
                                    <td>
                                        Название компании
                                    </td>
                                    <td>
                                        <a>
                                            {{ $vacancy->title }}
                                        </a>
                                        <br>
                                        <small>
                                            {{ $vacancy->created_at }}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Офер</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('vacancies.show', [$vacancy->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Просмотреть
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('vacancies.edit', [$vacancy->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактировать
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('vacancies.destroy', [$vacancy->id]) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $vacancies->links() }}
            </div>
        </div>

    </section>
@endsection
