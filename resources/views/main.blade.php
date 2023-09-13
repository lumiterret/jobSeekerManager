@extends('layouts.main')

@section('title', 'Добро пожаловать!')

@section('content')
    <div class="content-wrapper" style="min-height: 733px;">
        {{-- Content Header (Page header) --}}
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">Мы рады вас приветствовать в {{ config('app.name', 'Laravel') }} @yield('title') </h1>
                    </div>{{-- /.col --}}
                </div>{{-- /.row --}}
            </div>{{-- /.container-fluid --}}
        </div>
        {{-- /.content-header --}}

        {{-- Main content --}}
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card card-primary card-outline">
                            <div class="card-header align-center">
                                <h5 class="card-title">job search tracking system</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text">Система по отслеживанию процесса поиска работы.</p>

                                <p class="card-text">Основная цель системы — упростить процесс поиска работы и сделать его более эффективным и прозрачным. Для этого соискателю предоставляется доступ к платформе для сбора и просмотра информации о вакансиях и компаниях, отслеживания прогресса прохождения собеседований.</p>

                                <p class="card-text">Во многом поиск работы - тоже работа.
                                    Не зависимо от того много или мало предложений, отслеживание их прогресса может представлять не тривиальную задачу и соискатель в такой ситуации вполне может потеряться.</p>

                                <p class="card-text">Наша система преследует цель помочь в поиске работы и как нам кажется сделает процесс менее стрессовым.</p>

                                <p class="card-text">Сейчас при использовании системы соискатель получает возможность агрегировать вакансии с привязкой к компаниям и людям с которыми он общался по этим вакансиям. Планировать собеседования и встречи.</p>
{{--                                <a href="#" class="card-link">Card link</a>--}}
                            </div>
                        </div><!-- /.card -->
                    </div>
                    {{-- /.col-md-6 --}}
                </div>
                {{-- /.row --}}
            </div>{{-- /.container-fluid --}}
        </div>
        {{-- /.content --}}
    </div>
@endsection
