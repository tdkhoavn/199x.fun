<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="{{ route('admin.index') }}">
        <img alt="199x logo" class="brand-image img-circle elevation-3" src="/backend/img/AdminLTELogo.png" style="opacity: .8">
        <span class="brand-text font-weight-light">199x</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
                <!-- Dashboard -->
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
                <!-- END Dashboard -->

                <!-- Timeline -->
                <li class="nav-item">
                    @if (Route::currentRouteName() == 'admin.timeline')
                    <a href="{{ route('admin.timeline') }}" class="nav-link active">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>Timeline</p>
                    </a>
                    @else
                    <a href="{{ route('admin.timeline') }}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>Timeline</p>
                    </a>
                    @endif
                </li>
                <!-- END Timeline -->

                <!-- Events -->
                @if (Route::is('admin.events.*'))
                <li class="nav-item has-treeview menu-open">
                @else
                <li class="nav-item has-treeview">
                @endif
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Events<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (Route::currentRouteName() == 'admin.events.index')
                            <a href="{{ route('admin.events.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                            @else
                            <a href="{{ route('admin.events.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Route::currentRouteName() == 'admin.events.create')
                            <a href="{{ route('admin.events.create') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                            @else
                            <a href="{{ route('admin.events.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                            @endif
                        </li>
                    </ul>
                </li>
                <!-- END Events -->

                <!-- Films -->
                @if (Route::is('admin.films.*'))
                <li class="nav-item has-treeview menu-open">
                @else
                <li class="nav-item has-treeview">
                @endif
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>Films<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (Route::currentRouteName() == 'admin.films.index')
                            <a href="{{ route('admin.films.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                            @else
                            <a href="{{ route('admin.films.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Route::currentRouteName() == 'admin.films.create')
                            <a href="{{ route('admin.films.create') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                            @else
                            <a href="{{ route('admin.films.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                            @endif
                        </li>
                    </ul>
                </li>
                <!-- END Films -->

            </ul>
        </nav>
    </div>
</aside>
