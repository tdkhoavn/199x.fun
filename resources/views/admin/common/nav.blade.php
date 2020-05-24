<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ route('images.avatar', [Auth::id(), Auth::user()->avatar]) }}" class="user-image img-circle elevation-2" alt="">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-primary">
                    <img src="{{ route('images.avatar', [Auth::id(), Auth::user()->avatar]) }}" class="img-circle elevation-2" alt="">
                    <p>{{ Auth::user()->name }}<small>{{ Auth::user()->email }}</small></p>
                </li>
                <li class="user-footer">
                    <a href="{{ route('admin.profiles.edit') }}" class="btn btn-default btn-flat">Profile</a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat float-right">Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
