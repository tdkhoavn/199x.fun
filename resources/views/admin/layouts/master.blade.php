<!DOCTYPE html>
<html lang="vi">
<head>
    {!! Meta::toHtml() !!}
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.common.nav')
        @include('admin.common.aside')
        <div class="content-wrapper">
            @yield('breadcrumb')
            <section class="content">
                @yield('container')
            </section>
        </div>
        @include('admin.common.footer')
    </div>
    @include('admin.common.js')
</body>
</html>
