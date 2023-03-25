<!-- Brand logo -->
<a href="{{ route('home') }}" class="brand-link">
    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="JobSeeker manager" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">JobSeeker manager</span>
</a>
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ Vite::asset('resources/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Admin Panel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a><ul class="nav nav-treeview">
                        <li class="nav-item">

                        </li>
                    </ul>
                </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-building"></i>
                    <p>
                        Employers
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
