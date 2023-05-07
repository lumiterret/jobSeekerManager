<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">Обзор</a>
        </li>
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
        @endif
    </ul>
</nav>
