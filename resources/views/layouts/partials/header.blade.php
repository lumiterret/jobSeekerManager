<nav
    class="navbar navbar-white navbar-light @if(auth()->user()) navbar-expand main-header @endif">
    <ul class="navbar-nav">
        @if(auth()->user())
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">Обзор</a>
            </li>
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        @if(auth()->user())
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
                <a href="{{ route('login') }}" class="nav-link">Вход</a>
            </li>
        @endif
    </ul>
</nav>
