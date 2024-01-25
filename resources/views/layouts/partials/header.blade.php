<nav
    class="navbar navbar-white navbar-light navbar-expand main-header">
    <ul class="navbar-nav">
        @if(!Route::is('home'))
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        @endif
             <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">Обзор</a>
            </li>
        @if(Auth::user())
                <li class="nav-item">
                    <a href="{{ route('feed-back.create') }}" class="nav-link">Обратная связь</a>
                </li>
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        @auth
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Vite::asset('resources/img/avatar.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">
                            {{ user()->username }}
                    </span>
                </a>
                <div class="dropdown-menu" style="left: inherit; right: 0px;">
                    <a class="dropdown-item" href="{{ route('users.show', user()->id) }}">Профиль</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        Выход
                    </a>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Вход</a>
            </li>
        @endauth
    </ul>
</nav>
