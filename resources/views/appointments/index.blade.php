@extends('layouts.base')

@section('title', 'Назначения')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Назначения</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Обзор</a></li>
                        <li class="breadcrumb-item active">Назначения</li>
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
                <div class="row">
                    <div class="col col-sm-3">
                        <form method="get" action="{{ route('appointments.index')}}">
                            <div class="form-group mb-3">
                                <label class="col-form-label-sm" for="status">Статус</label>
                                <div>
                                    <select class="form-control" id="status" name="status[]" multiple>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}">
                                                {{ __(ucfirst($status)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Поиск</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Назначения</h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body p-0">
                <x-appointments.list-table :appointments="$appointments"/>
            </div>
            <div class="card-footer">
                @if($appointments->count())
                    {{ $appointments->appends(request()->query())->links() }}
                @endif
            </div>
        </div>
    </section>

    <script>
        window.addEventListener("load", function() {
            $('#status').select2({
                placeholder: 'Статус назначения'
            });
        })
    </script>
@endsection
