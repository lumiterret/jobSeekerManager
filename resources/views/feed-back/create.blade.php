@extends('layouts.base')

@section('title', 'Обратная связь')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Отклик</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Обзор
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Обратная связь
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавление отклика</h3>

                {{--<div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>--}}
            </div>
            <div class="card-body">
                <div class="col-lg-7">
                    <form method="post" action="{{ route('feed-back.store') }}">
                        @csrf
                        <input type="hidden" name="user-id" value="{{ user()->id }}">
                        {{--<div class="form-group">
                            <label for="inputName">Имя</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">Телефон</label>
                            <input type="text" id="inputPhone" class="form-control">
                        </div>--}}
                        <div class="form-group">
                            <label for="inputMessage">Ваше сообщение<br> <small>не более 3 000 символов</small></label>
                            <div class="container-feedback">
                                <textarea
                                    id="inputMessage"
                                    class="form-control feedback"
                                    name="content">{{ old('content') }}</textarea>

                                <div class="counter">
                                    <span class="current">0</span>&nbsp;/
                                    <span class="total">3000</span>
                                </div>
                            </div>
                        </div>
                        {{--@include('users.includes.form-fields')--}}
                        <button type="submit" class="btn btn-success">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>

        // счётчик символов в текстовом поле
        const textarea = document.querySelector('textarea.feedback');
        const counter = document.querySelector('.current');
        const maxlength = 3000;

        textarea.addEventListener('input', onInput)

        function onInput(event) {
            console.log(event);
            event.target.value = event.target.value.slice(0, maxlength); // обрезаем текст до 4000 символов
            counter.textContent = event.target.value.length;
        }
    </script>
@endsection
