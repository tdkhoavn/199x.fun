<!DOCTYPE html>
<html>
<head>
    {!! Meta::toHtml() !!}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/backend/css/icheck-bootstrap.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('admin.index') }}">Đăng nhập | <b>199x.fun</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Nhập thông tin để đăng nhập</p>
                {!!
                    Form::open([
                        'url'          => route('admin.login'),
                        'method'       => 'post',
                        'novalidate'   => 'novalidate',
                        'autocomplete' => 'off'
                    ])
                !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                @if ($errors->has('email'))
                                    <input type="email" id="email" name="email" class="form-control is-invalid" placeholder="Email" value="{{ old('email') }}">
                                    <span class="error"><i class="far fa-times-circle"></i> {{ $errors->first('email') }}</span>
                                @else
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                @if ($errors->has('password'))
                                    <input type="password" id="password" name="password" class="form-control is-invalid" placeholder="Mật khẩu">
                                    <span class="error invalid-feedback"><i class="far fa-times-circle"></i> {{ $errors->first('password') }}</span>
                                @else
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <div class="social-auth-links text-center mb-3">
                    <p>- HOẶC -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng nhập với Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Đăng nhập với Google
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.common.js')
</body>
</html>
