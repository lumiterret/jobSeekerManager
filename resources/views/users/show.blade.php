@extends('layouts.base')

@section('title', 'Просмотр профиля - ' . $user->username)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{$user->username}}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                Обзор
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('users.index') }}">
                                Пользователи
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Просмотр
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#user-show" data-toggle="tab">
                                        Просмотр
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user-edit" data-toggle="tab">
                                        Редактировать
                                    </a>
                                </li>
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="user-show">
                                    {{-- Просмотр --}}
                                    @include('users.includes.show-tabs.browse-tab')
                                </div>{{-- /.tab-pane Просмотр --}}
                                <div class="tab-pane" id="user-edit">
                                    {{-- Редактирование --}}
                                    @include('users.includes.show-tabs.edit-tab')
                                </div>{{-- /.tab-pane Редактирование--}}
                            </div>{{-- /.tab-content --}}
                        </div> {{-- /.card-body --}}
                    </div> {{-- /.card --}}
                </div> {{-- /.col --}}
            </div>
        </div>
    </section>
@endsection
