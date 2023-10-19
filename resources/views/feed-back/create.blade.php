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
            <div class="card-body row">

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
                            <label for="inputMessage">Ваше сообщение</label>
                            <textarea id="inputMessage" class="form-control" rows="4" name="content" required value="{{ old('content') }}"></textarea>
                        </div>
                        {{--@include('users.includes.form-fields')--}}
                        <button type="submit" class="btn btn-success">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
