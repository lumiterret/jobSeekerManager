<!-- Brand logo -->
<a href="{{ route('home') }}" class="brand-link">
    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="JobSeeker manager" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">JobSeeker manager</span>
</a>
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img
                src="{{ Vite::asset('resources/img/avatar.png') }}"
                class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Вася Ветров</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item"> {{-- Меню вакансий --}}
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-business-time"></i>
                    <p>
                        Вакансии
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacancies.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Список
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacancies.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Добавить
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"> {{-- Меню компаний --}}
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-building"></i>
                    <p>
                        Компании
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employers.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Список
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employers.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Добавить
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"> {{-- Меню контактных лиц --}}
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-address-book"></i>
                    <p>
                        Контактные лица
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('people.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Список
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('people.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            Добавить
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
