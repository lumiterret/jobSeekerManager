@extends('layouts.guest')

@section('main')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1">Job Seeker</a>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email', $request->email) }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('email')
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
                <div class="input-group mb-3">
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="Подтверждение пароля">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password_confirmation')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="flex-grow-1">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Reset')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
@endsection
