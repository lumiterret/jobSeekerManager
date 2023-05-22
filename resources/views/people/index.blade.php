@extends('layouts.base')

@section('title', 'Контактные лица')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Контактные лица</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item active">Контактные лица</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Фильтры</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row w-100">
                    <div class="col">
                        @include('people.includes.index-filters')
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Контактные лица</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('people.create') }}">
                        <i class="fas fa-plus-circle">
                        </i>
                        Добавить
                    </a>
                </div>
            </div>
            <div class="card-body p-0">

                @if($people->count())
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 25%">
                            Полное Имя
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($people as $person)
                            <tr>
                                <td>
                                    {{ $person->id }}
                                </td>
                                <td>
                                    <a href="{{ route('people.show', [$person->id]) }}">
                                        {{ $person->full_name }}
                                    </a>
                                    <br>
                                    <small>
                                        {{ $person->created_at }}
                                    </small>
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
                @if($people->count())
                    {{ $people->appends(request()->query())->links() }}
                @endif
            </div>
        </div>

    </section>
@endsection
