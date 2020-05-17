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
                {!! Form::open(['url' => route('admin.events.type.store'), 'method' => 'posts', 'role' => 'form']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên loại</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <label class="col-form-label text-danger" for="start_date"><i class="far fa-times-circle"></i> {{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tìm</button>
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
                            </tr>
                        </thead>
                        <tbody>
                            @if ($events && $events->isNotEmpty())
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->admin->name }}</td>
                                <td>{{ implode(',', $event->member_id) }}</td>
                                <td>{{ $event->type->name }}</td>
                                <td>{{ $event->total }}</td>
                                <td>{{ $event->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $event->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            @endforeach
                            @else
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $events->links('admin.common.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
