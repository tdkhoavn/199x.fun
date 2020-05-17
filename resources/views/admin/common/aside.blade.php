<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="index3.html">
        <img alt="199x Logo" class="brand-image img-circle elevation-3" src="/backend/img/AdminLTELogo.png" style="opacity: .8">
            <span class="brand-text font-weight-light">199x</span>
        </img>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img alt="" class="img-circle elevation-2" src="/backend/img/user2-160x160.jpg"></img>
            </div>
            <div class="info">
                <a class="d-block" href="#">Khoa Trần</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link active" href="#">
                        <i class="nav-icon fas fa-tachometer-alt">
                        </i>
                        <p>Sự kiện<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.events.create') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
