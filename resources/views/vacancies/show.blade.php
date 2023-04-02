@extends('layouts.base')

@section('title', 'Обзор')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$vacancy->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Обзор</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vacancies.index') }}">Вакансии</a></li>
                        <li class="breadcrumb-item active">Просмотр</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Детали вакансии</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <h4>Описание</h4>
                                <div class="post" style="height: 80%">
                                    @markdown{{ $vacancy->description }}@endmarkdown
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-muted">
                            <h5 class="mt-5 text-muted">Компания</h5>
                            <b class="d-block"><a href="{{route('employers.show', [$vacancy->employer->id])}}">{{ $vacancy->employer->title }}</a></b>
                            <h5 class="mt-5 text-muted">Контакты</h5>
                            @if(count($vacancy->people))
                                <ul>
                                    @foreach($vacancy->people as $person)
                                    <li>
                                        <a href="{{ route('people.show', [$person->id]) }}">
                                            {{ $person->full_name }}
                                        </a>
                                        @include('contacts.index')
                                    </li>
                                    @endforeach
                                </ul>
                            {{-- Список контактов --}}
                            @endif
                        </div>
                        <div class="text-center mt-5 mb-3">
                            <a href="{{ route('vacancies.edit', [$vacancy->id]) }}" class="btn btn-sm btn-primary">
                                Редактировать
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

