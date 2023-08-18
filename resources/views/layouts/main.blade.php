<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    </head>
    <body class="sidebar-mini layout-fixed  sidebar-collapse" style="height: auto">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
                <img class="animation__shake" src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" height="60" width="60" style="display: none;">
            </div>
            @include('layouts.partials.header')
            <main class="content-wrapper" style="height: auto;">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
                tiokn
            </main>
        </div>
    </body>
</html>
