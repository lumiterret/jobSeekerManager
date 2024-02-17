@extends('layouts.guest')

@section('main')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1">Job Seeker</a>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Внимание!</h5>
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" placeholder="Логин" value="{{ old('username') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('username')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Запомнить
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Log in')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Сбросить пароль?</a><br>
                @if(env('APP_ENV') === 'prod')
                    <a href="{{ route('register') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Зарегистрировать аккаунт</a>
                @endif
        </div>
    </div>
@endsection
