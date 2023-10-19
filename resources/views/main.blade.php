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
                                <h5 class="card-title">Job Seeker Manager – Ваш идеальный помощник в поиске работы!</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text">Все мы знаем, что поиск работы может быть сложным и утомительным процессом. Но с Job Seeker Manager вы сможете преобразить этот процесс в приятное и результативное приключение!</p>

                                <p class="card-text">Job Seeker Manager – это инновационная платформа, разработанная специально для тех, кто активно ищет работу. Наше приложение предлагает множество удобных функций, которые помогут вам организовать и упростить весь процесс поиска работы.

                                <p class="card-text">Основные преимущества Job Seeker Manager:</p>
                                <ol>
                                    <li>Централизованное управление вакансиями: Забудьте о бесконечных записях, таблицах и списочных файлах с вакансиями. С Job Seeker Manager, вы сможете удобно искать, отслеживать и организовывать все интересующие вас вакансии в одном месте.</li>
                                    <li>Сейчас при использовании системы соискатель получает возможность агрегировать вакансии с привязкой к компаниям и людям с которыми он общался по этим вакансиям. Планировать собеседования и встречи.</li>
                                    <li>Планирование собеседований и встреч: Больше не пропускайте важные события! Job Seeker Manager предоставляет возможность, отслеживать ваши договоренности о собеседованиях и других важных событиях, чтобы вы всегда были в курсе дел.</li>
                                </ol>

                                <p class="card-text">Не теряйте время и энергию на бесконечный поиск работы. Доверьтесь Job Seeker Manager и сфокусируйтесь только на том, чтобы найти идеальную работу для себя!</p>

                                <p class="card-text">Зарегистрируйтесь на нашем сайте прямо сейчас и начните оптимизировать свой поиск работы с Job Seeker Manager!"</p>

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
