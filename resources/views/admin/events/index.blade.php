@extends('admin.layouts.master')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách Event</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách Event</li>
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
                    <h3 class="card-title">Lọc Event</h3>
                </div>
                {!! Form::open(['url' => route('admin.events.index'), 'method' => 'get', 'role' => 'form']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="created_by">Ai tổ chức</label>
                                <select class="form-control select2" name="created_by" id="created_by">
                                    <option></option>
                                    @foreach ($members as $member)
                                        @if ($request->created_by == $member->id)
                                        <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                                        @else
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="start_date">Ngày diễn ra</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ $request->start_date }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="member_id">Nguời tham gia</label>
                            <select class="form-control select2" multiple="multiple" style="width: 100%;" name="member_id[]" id="member_id">
                                <option></option>
                                @foreach ($members as $member)
                                    @if ($request->member_id && in_array($member->id, $request->member_id))
                                    <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                                    @else
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type_id">Thể loại</label>
                            <select class="form-control select2" name="type_id" id="type_id">
                                <option></option>
                                @foreach ($event_types as $event_type)
                                    @if ($request->type_id == $event_type->id)
                                    <option value="{{ $event_type->id }}" selected>{{ $event_type->name }}</option>
                                    @else
                                    <option value="{{ $event_type->id }}">{{ $event_type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tìm</button>
                        <a class="btn btn-default float-right" href="{{ route('admin.events.index') }}">Xóa lọc</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Event</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Ngày diễn ra</th>
                                <th>Nguời tạo</th>
                                <th>Nguời tham gia</th>
                                <th>Thể loại</th>
                                <th>Tổng số tiền</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($events && $events->isNotEmpty())
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->start_date->format('d-m-Y') }}</td>
                                <td>
                                    @if ($event->created_by == auth()->id())
                                    <span class="badge badge-info">{{ $event->admin->name }}</span>
                                    @else
                                    {{ $event->admin->name }}
                                    @endif
                                </td>
                                <td>{{ get_members($members, $event->member_id)->pluck('name')->implode('＼') }}</td>
                                <td><span class="badge" style="background-color: {{ $event->type->color }}">{{ $event->type->name }}</span></td>
                                <td>{{ number_format($event->total, 0, ',', '.') }}</td>
                                <td>{{ $event->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $event->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td><a class="btn btn-block btn-sm btn-outline-primary" href="{{ route('admin.events.edit', $event->id) }}">Sửa</a></td>
                                <td>
                                    <button class="btn btn-block btn-sm btn-outline-danger" data-toggle="modal" data-target="#model-delete" data-event_id="{{ $event->id }}">Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10">Không có dữ liệu</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $events->appends(request()->toArray())->links('admin.common.pagination') }}
                </div>
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

        $('#start_date').daterangepicker(datePickerSetting);

        $('#start_date').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' 〜 ' + picker.endDate.format('DD-MM-YYYY'));
        });

        $('#start_date').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('#model-delete').on('show.bs.modal', function(e) {
            const event_id = $(e.relatedTarget).data('event_id');
            const url      = "{!! route('admin.events.index') !!}/" + event_id;
            $("#frm-delete").attr('action', url);
        });
    });
</script>
@endsection

@section('modal')
<div class="modal fade" id="model-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xóa Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc muốn xóa Event</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                {!! Form::open(['method' => 'delete', 'id' => 'frm-delete']) !!}
                <button type="submit" class="btn btn-danger">Xóa</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
