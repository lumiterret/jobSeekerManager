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
            <form method="post" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    {{--<div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Запомнить
                            </label>
                        </div>
                    </div>--}}
                    <!-- /.col -->
                    <div  class="flex-grow-1">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{__('Reset Password')}}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
@endsection
