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
                                    <option value="{{ $member->id }}" {{ $request->created_by == $member->id ? "selected" : null }}>{{ $member->name }}</option>
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
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type_id">Thể loại</label>
                            <select class="form-control select2" name="type_id" id="type_id">
                                <option></option>
                                @foreach ($event_types as $event_type)
                                <option value="{{ $event_type->id }}" {{ $request->type_id == $event_type->id ? "selected" : null }}>{{ $event_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tìm</button>
                        <a class="btn btn-default float-right" href="{{ route('admin.events.index') }}">Xóa</a>
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
                                <td>{{ $event->admin->name }}</td>
                                <td>{{ get_members($members, $event->member_id)->pluck('name')->implode('＼') }}</td>
                                <td><span class="badge" style="background-color: {{ $event->type->color }}">{{ $event->type->name }}</span></td>
                                <td>{{ number_format($event->total, 0, ',', '.') }}</td>
                                <td>{{ $event->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $event->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td><a class="btn btn-block btn-sm btn-outline-primary" href="{{ route('admin.events.edit', $event->id) }}">Sửa</a></td>
                                <td><a class="btn btn-block btn-sm btn-outline-danger" href="{{ route('admin.events.destroy', $event->id) }}">Xóa</a></td>
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
<script src="/backend/plugins/select2/js/select2.full.min.js"></script>
<script src="/backend/plugins/daterangepicker/js/daterangepicker.min.js"></script>

<script>
    $(function () {
        $('.select2').select2({
            placeholder: "Vui lòng chọn"
        });
        $('#start_date').daterangepicker({
            "autoUpdateInput": false,
            "showDropdowns": true,
            "locale": {
                "format": "DD-MM-YYYY",
                "separator": " 〜 ",
                "applyLabel": "Chọn",
                "cancelLabel": "Bỏ chọn",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "T",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
                "firstDay": 1
            },
        });

        $('#start_date').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' 〜 ' + picker.endDate.format('DD-MM-YYYY'));
        });

        $('#start_date').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('.inpCount').bind('keyup focus', function() {
            var strCount = $(this).val().length;
            var strMax = $(this).data('max');
            var prev = $(this).parents('div').find('.txtCount');
            $(prev).find('span').text(strCount);
            if (strCount > strMax) {
                $(prev).addClass('text-danger');
                $(prev).removeClass('text-info');
            } else {
                $(prev).removeClass('text-danger');
                $(prev).addClass('text-info');
            }
        });
        $('.inpCount').each(function(){
            $(this).trigger('keyup');
        });

        function convertVal(_val) {
            _val = _val + '';
            if (_val != '') {
                if (_val.length > 3) {
                    _val = parseInt(_val).toLocaleString('vi-VN');
                }
            }
            return _val;
        }

        function add_unit($this) {
            var input_tem = '';
            input_tem = $this.val();
            if (input_tem == '') {
                return;
            }
            if (event.which >= 37 && event.which <= 40) {
                return false;
            }
            var input_val = input_tem.replace(/\./g, '');
            input_val = parseInt(input_val);
            if (!/^[0-9]+$/.test(input_val)) {
                return;
            }
            var inp_val = convertVal(input_val);
            var start = $this[0].selectionStart,
                end = $this[0].selectionEnd;

            $this.val(inp_val);
            if (inp_val.length < input_tem.length) {
                end = end - 1;
                start = start - 1;
                if (start == -1 || end == -1) {
                    start = 0;
                    end = 0;
                }
            }
            if (inp_val.length > input_tem.length) {
                end = end + 1;
                start = start + 1;
            }
            $this[0].setSelectionRange(start, end);
        }

        $('#total').on('keyup', function () {
            add_unit($(this));
        });
    });
</script>
@endsection
