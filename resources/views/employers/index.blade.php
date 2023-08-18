@extends('layouts.base')

@section('title', 'Компании')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Компании</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Обзор</a></li>
                        <li class="breadcrumb-item active">Компании</li>
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
                        @include('employers.includes.index-filters')
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Компании</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('employers.create') }}">
                        <i class="fas fa-plus-circle">
                        </i>
                        Добавить новую
                    </a>
                </div>
            </div>
            <div class="card-body p-0">

                @if($employers->count())
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 25%">
                            Название компании
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($employers as $employer)
                            <tr>
                                <td>
                                    {{ $employer->id }}
                                </td>
                                <td>
                                    <a href="{{ route('employers.show', [$employer->id]) }}">
                                        {{ $employer->title }}
                                    </a>
                                    <br>
                                    <small>
                                        {{ $employer->created_at }}
                                    </small>
                                </td>
                                <td>
                                    <x-employers.status-badge :active="$employer->activeVacancies"/>
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
                @if($employers->count())
                {{ $employers->appends(request()->query())->links() }}
                @endif
            </div>
        </div>

    </section>
@endsection
