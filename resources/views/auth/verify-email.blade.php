@extends('layouts.guest')

@section('main')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1">Job Seeker</a>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Внимание!</h5>
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{ route('verification.send') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Повторить отправку письма для подтверждения email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
