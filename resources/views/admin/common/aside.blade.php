<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="index3.html">
        <img alt="199x Logo" class="brand-image img-circle elevation-3" src="/backend/img/AdminLTELogo.png" style="opacity: .8">
        <span class="brand-text font-weight-light">199x</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img alt="" class="img-circle elevation-2" src="/backend/img/user2-160x160.jpg"></img>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
                <li class="nav-item">
                    @if (Route::currentRouteName() == 'admin.index')
                    <a href="{{ route('admin.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    @else
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (Route::currentRouteName() == 'admin.events.index')
                    <a href="{{ route('admin.events.index') }}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách Event</p>
                    </a>
                    @else
                    <a href="{{ route('admin.events.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách Event</p>
                    </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (Route::currentRouteName() == 'admin.events.create')
                    <a href="{{ route('admin.events.create') }}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm Event</p>
                    </a>
                    @else
                    <a href="{{ route('admin.events.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm Event</p>
                    </a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</aside>
