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
{{--                        @include('users.index-filters')--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Пользователи</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">
                        <i class="fas fa-plus-circle">
                        </i>
                        Добавить пользователя
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <x-users.list-table :users="$users"/>
            </div>
            <div class="card-footer">
                @if($users->count())
                    {{ $users->appends(request()->query())->links() }}
                @endif
            </div>
        </div>

    </section>
@endsection
