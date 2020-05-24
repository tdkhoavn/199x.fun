@extends('admin.layouts.master')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết Event</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
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
                    <h3 class="card-title">Chi tiết Event</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Người tổ chức</label>
                            <input class="form-control" type="text" value="{{ $event->admin->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Ngày diễn ra</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ $event->start_date->format('d-m-Y') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">Ngày tạo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ $event->created_at->format('d-m-Y') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">Ngày cập nhật</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ $event->updated_at->format('d-m-Y') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="member_id">Nguời tham gia</label>
                            <p>{{ get_member_name($members, $event->member_id, '＼', 100) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="type_id">Thể loại</label>
                            <p><span class="badge" style="background-color: {{ $event->type->color }}">{{ $event->type->name }}</span></p>
                        </div>
                        <div class="form-group">
                            <label for="total">Tổng số tiền</label>
                            <input class="form-control" type="text" name="total" id="total" value="{{ number_format($event->total, 0, ',', '.') }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea class="form-control" rows="5" name="note" id="note" disabled>{{ $event->note }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('admin.events.edit', $event->id) }}">Chỉnh sửa</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
