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
                    <h3 class="card-title">Thêm loại Event</h3>
                </div>
                {!! Form::open(['url' => route('admin.events.type.store'), 'method' => 'posts', 'role' => 'form']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên loại</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <label class="col-form-label text-danger" for="name"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Màu sắc</label>
                            <input class="form-control" type="color" id="color" name="color" value="{{ old('color') }}">
                            @error('color')
                            <label class="col-form-label text-danger" for="color"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Event</h3>
                </div>
                {!! Form::open(['url' => route('admin.events.store'), 'method' => 'posts', 'role' => 'form']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Ai tổ chức</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <label for="start_date">Ngày diễn ra</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="start_date" id="start_date" value="{{ old('start_date') }}">
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
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                            <label class="col-form-label text-danger" for="member_id"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type_id">Thể loại</label>
                            <select class="form-control select2" name="type_id" id="type_id">
                                <option></option>
                                @foreach ($event_types as $event_type)
                                <option value="{{ $event_type->id }}" {{ old('type_id') == $event_type->id ? "selected" : null }}>{{ $event_type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                            <label class="col-form-label text-danger" for="type_id"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total">Tổng số tiền</label>
                            <input class="form-control" type="text" name="total" id="total" value="{{ old('total') }}">
                            @error('total')
                            <label class="col-form-label text-danger" for="total"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea class="form-control inpCount" rows="5" data-max="1000" name="note" id="note">{{ old('note') }}</textarea>
                            <p class="text-info txtCount col-form-label float-right">Đang gõ... <span>--</span>/1000 ký tự</p>
                            @error('note')
                            <label class="col-form-label text-danger" for="note"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                {!! Form::close() !!}
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
        //Initialize Select2 Elements
        $('.select2').select2({
            placeholder: "Vui lòng chọn"
        });
        $('#start_date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "ranges": {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày truớc': [moment().subtract(6, 'days'), moment()],
                '30 ngày truớc': [moment().subtract(29, 'days'), moment()],
            },
            "locale": {
                "format": "DD-MM-YYYY",
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
            "showCustomRangeLabel": false,
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
