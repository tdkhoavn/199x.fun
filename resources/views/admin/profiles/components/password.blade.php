{!!
    Form::open([
        'id'      => 'frm-profile-password',
        'route'   => ['admin.auth.passwords.change.update', Auth::id()],
        'method'  => 'put',
        'role'    => 'form',
    ])
!!}
    <input type="hidden" name="active_tab" value="password">
    <div class="form-group">
        <label for="password">Mật khẩu hiện tại</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        <input class="form-control" type="password" name="password" id="password">
        @error('password')
        <label class="col-form-label text-danger" for="password"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="new_password">Mật khẩu mới</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        <input class="form-control" type="password" name="new_password" id="new_password">
        @error('new_password')
        <label class="col-form-label text-danger" for="new_password"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="new_password_confirmation">Xác nhận Mật khẩu mới</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation">
        @error('new_password_confirmation')
        <label class="col-form-label text-danger" for="new_password_confirmation"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>
{!! Form::close() !!}
