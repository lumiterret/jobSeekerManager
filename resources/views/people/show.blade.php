@extends('layouts.base')

@section('title', 'Контактное лицо - ' . $person->full_name)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Профиль</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('people.index') }}">Контактные лица</a></li>
                        <li class="breadcrumb-item active">Просмотр</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    {{-- Profile Image --}}
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ Vite::asset('resources/img/avatar2.png') }}"
                                     alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $person->full_name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $person->position }}
                            </p>
                            @include('contacts.index')
                        </div>
                        {{-- /.card-body --}}
                    </div>
                    {{-- /.card --}}

                    {{-- Description --}}
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            Описание
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <p class="text-muted">
                                Приветствую меня зовут "Name" - я представляю компанию "Conpany name"
                            </p>
                        </div> {{-- /.card-body --}}
                    </div>{{-- /Description --}}
                </div>{{-- /.col --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#vacancy" data-toggle="tab">Вакансии</a></li>
                                <li class="nav-item"><a class="nav-link" href="#edit-profile" data-toggle="tab">Редактировать</a></li>
                            </ul>
                        </div> {{-- /.card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="vacancy">
                                    {{-- Вакансия --}}
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div> {{-- /.card-body --}}
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>{{-- /.Вакансия --}}
                                </div>{{-- /.tab-pane --}}
                                <div class="tab-pane" id="edit-profile">
                                    <form method="post" action="{{ route('people.update', [$person->id]) }}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $person->id }}">
                                        @include('people.form-fields')
                                        <button type="submit" class="btn btn-success">Изменить</button>
                                    </form>
                                </div>{{-- /.tab-pane --}}
                            </div>{{-- /.tab-content --}}
                        </div> {{-- /.card-body --}}
                    </div> {{-- /.card --}}
                </div> {{-- /.col --}}
            </div>
        </div>
    </section>
@endsection

