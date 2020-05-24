@extends('admin.layouts.master')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa Event</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa</li>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Event</h3>
                </div>
                {!! Form::open(['url' => route('admin.events.update', $event->id), 'method' => 'put', 'role' => 'form']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Người tổ chức</label>
                            <input class="form-control" type="text" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Ngày diễn ra</label>
                            <small class="badge badge-danger float-right">Bắt buộc</small>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ old('start_date', $event->start_date->format('d-m-Y')) }}">
                            </div>
                            @error('start_date')
                            <label class="col-form-label text-danger" for="start_date"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="member_id">Nguời tham gia</label>
                            <select class="form-control select2" multiple="multiple" style="width: 100%;" name="member_id[]" id="member_id">
                                <option></option>
                                @foreach ($members as $member)
                                    @if (old('member_id', $event->member_id) && in_array($member->id, old('member_id', $event->member_id))))
                                    <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                                    @else
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('member_id')
                            <label class="col-form-label text-danger" for="member_id"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type_id">Thể loại</label>
                            <small class="badge badge-danger float-right">Bắt buộc</small>
                            <select class="form-control select2" name="type_id" id="type_id">
                                <option></option>
                                @foreach ($event_types as $event_type)
                                    @if (old('type_id', $event->type_id) == $event_type->id)
                                    <option value="{{ $event_type->id }}" selected>{{ $event_type->name }}</option>
                                    @else
                                    <option value="{{ $event_type->id }}">{{ $event_type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('type_id')
                            <label class="col-form-label text-danger" for="type_id"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total">Tổng số tiền</label>
                            <small class="badge badge-danger float-right">Bắt buộc</small>
                            <input class="form-control" type="text" name="total" id="total" value="{{ old('total', number_format($event->total, 0, ',', '.')) }}">
                            @error('total')
                            <label class="col-form-label text-danger" for="total"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea class="form-control inpCount" rows="5" data-max="1000" name="note" id="note">{{ old('note', $event->note) }}</textarea>
                            <p class="text-info txtCount col-form-label float-right"><span>--</span>/1000 ký tự</p>
                            @error('note')
                            <label class="col-form-label text-danger" for="note"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    $(function () {
        $('.select2').select2({
            placeholder: "Vui lòng chọn"
        });

        $('#start_date').daterangepicker(singleDatePickerSetting);
    });
</script>
@endsection
