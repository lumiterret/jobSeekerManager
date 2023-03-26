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

                @if($vacancies->count())
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 25%">
                            Название вакансии
                        </th>
                        <th style="width: 25%">
                            Компания
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($vacancies as $vacancy)
                                <tr>
                                    <td>
                                        {{ $vacancy->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('vacancies.show', [$vacancy->id]) }}">
                                            {{ $vacancy->title }}
                                        </a>
                                        <br>
                                        <small>
                                            {{ $vacancy->created_at }}
                                        </small>
                                    </td>
                                    <td>
                                        <a href="{{ route('employers.show', [$vacancy->employer->id]) }}">
                                        {{ $vacancy->employer->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Офер</span>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                    <p>Ничего не найдено</p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                @if($vacancies->count())
                {{ $vacancies->links() }}
                @endif
            </div>
        </div>

    </section>
@endsection
