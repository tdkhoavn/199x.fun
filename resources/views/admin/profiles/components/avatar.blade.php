{!!
    Form::open([
        'id'      => 'frm-profile-avatar',
        'route'   => ['admin.profiles.avatar.update', Auth::id()],
        'method'  => 'put',
        'role'    => 'form',
        'enctype' => 'multipart/form-data'
    ])
!!}
    <input type="hidden" name="active_tab" value="avatar">
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                <label class="custom-file-label" for="avatar">Chọn hình ảnh</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        @error('avatar')
        <label class="col-form-label text-danger" for="avatar"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>
{!! Form::close() !!}
