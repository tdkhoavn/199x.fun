{!!
    Form::open([
        'id'      => 'frm-profile-general',
        'route'   => ['admin.profiles.update', Auth::id()],
        'method'  => 'put',
        'role'    => 'form',
        'enctype' => 'multipart/form-data'
    ])
!!}
    <input type="hidden" name="active_tab" value="general">
    <div class="form-group">
        <label for="name">Tên</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $admin->name) }}">
        @error('name')
        <label class="col-form-label text-danger" for="name"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="text" value="{{ $admin->email }}" disabled>
    </div>

    <div class="form-group">
        <label for="">Giới tính</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        @foreach (get_flags('gender_status') as $key => $value)
        <div class="form-check">
            @if (old('gender', $admin->gender) == $key)
            <input class="form-check-input" type="radio" name="gender" value="{{ $key }}" checked>
            <label class="form-check-label">{{ $value }}</label>
            @else
            <input class="form-check-input" type="radio" name="gender" value="{{ $key }}">
            <label class="form-check-label">{{ $value }}</label>
            @endif
        </div>
        @endforeach
        @error('gender')
        <label class="col-form-label text-danger" for="name"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>

    <div class="form-group">
        <label for="start_date">Ngày sinh</label>
        <small class="badge badge-danger float-right">Bắt buộc</small>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <input type="text" class="form-control float-right" name="birthday" id="birthday" value="{{ old('birthday', $admin->birthday->format('d-m-Y')) }}">
        </div>
        @error('birthday')
        <label class="col-form-label text-danger" for="birthday"><i class="far fa-times-circle"></i> {{ $message }}</label>
        @enderror
    </div>
{!! Form::close() !!}
