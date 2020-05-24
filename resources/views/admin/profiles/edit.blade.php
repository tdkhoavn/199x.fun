@extends('admin.layouts.master')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thông tin tài khoản</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông tin tài khoản</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="profile-tabHeader" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="general-tabHeader" data-toggle="pill" href="#general-tabContent" role="tab" aria-controls="general-tabContent" aria-selected="true">Cơ bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="avatar-tabHeader" data-toggle="pill" href="#avatar-tabContent" role="tab" aria-controls="avatar-tabContent" aria-selected="false">Avatar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tabHeader" data-toggle="pill" href="#password-tabContent" role="tab" aria-controls="password-tabContent" aria-selected="false">Đổi mật khẩu</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="profile-tabContent">
                        <!-- general-tab -->
                        <div class="tab-pane fade" id="general-tabContent" role="tabpanel" aria-labelledby="general-tabHeader">
                        @include('admin.profiles.components.general')
                        </div>
                        <!-- END general tab -->

                        <!-- avatar tab -->
                        <div class="tab-pane fade" id="avatar-tabContent" role="tabpanel" aria-labelledby="avatar-tabHeader">
                        @include('admin.profiles.components.avatar')
                        </div>
                        <!-- END avatar tab -->

                        <!-- password tab -->
                        <div class="tab-pane fade" id="password-tabContent" role="tabpanel" aria-labelledby="password-tabHeader">
                        @include('admin.profiles.components.password')
                        </div>
                        <!-- END password tab -->
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btn-submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
        $('#birthday').daterangepicker(singleDatePickerSetting);
    });
    bsCustomFileInput.init();

    let active_tab = sessionStorage.getItem('active_tab');
    switch (active_tab) {
        case 'general':
            $("#general-tabHeader").addClass('active');
            $("#general-tabContent").addClass('show active');
            break;
        case 'avatar':
            $("#avatar-tabHeader").addClass('active');
            $("#avatar-tabContent").addClass('show active');
            break;
        case 'password':
            $("#password-tabHeader").addClass('active');
            $("#password-tabContent").addClass('show active');
            break;
        default:
            $("#general-tabHeader").addClass('active');
            $("#general-tabContent").addClass('show active');
    }

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        const target = $(e.target).attr('href');
        switch (target) {
            case '#general-tabContent':
                sessionStorage.setItem('active_tab', 'general');
                break;
            case '#avatar-tabContent':
                sessionStorage.setItem('active_tab', 'avatar');
                break;
            case '#password-tabContent':
                sessionStorage.setItem('active_tab', 'password');
                break;
        }
    });

    $("#btn-submit").click(function () {
        let active_tab = sessionStorage.getItem('active_tab');
        switch (active_tab) {
            case 'general':
                $("#frm-profile-general").submit();
                break;
            case 'avatar':
                $("#frm-profile-avatar").submit();
                break;
            case 'password':
                $("#frm-profile-password").submit();
                break;
            default:
                $("#frm-profile-general").submit();
        }
    })
</script>
</script>
@endsection
