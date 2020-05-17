@extends('admin.layouts.master')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Dashboard
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="/backend/plugins/fullcalendar/core/main.min.js"></script>
<script src="/backend/plugins/fullcalendar/bootstrap/main.min.js"></script>
<script src="/backend/plugins/fullcalendar/daygrid/main.min.js"></script>
<script src="/backend/plugins/fullcalendar/timegrid/main.min.js"></script>
<script src="/backend/plugins/fullcalendar/interaction/main.min.js"></script>
<script src="/backend/plugins/select2/js/select2.full.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var date = new Date()
    var d    = date.getDate();
    var m    = date.getMonth();
    var y    = date.getFullYear();

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'vi',
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
        defaultView: 'dayGridMonth',
        defaultDate: new Date(y, m, d),
        firstDay: 1,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        'themeSystem': 'bootstrap',
        events: [
            {
                title: '【Đổi nuớc】Tấn',
                url: '{{ route('admin.events.create') }}',
                start: new Date(y, m, + 3),
                backgroundColor: '#f56954',
                borderColor    : '#f56954',
                allDay         : true
            },
            {
                title: '【Giặt đồ】Khoa',
                url: '{{ route('admin.events.create') }}',
                start: new Date(y, m, d + 1),
                backgroundColor: '#00a65a',
                borderColor    : '#00a65a',
                allDay         : true
            },
            {
                title: '【Giặt đồ】Hòa',
                url: '{{ route('admin.events.create') }}',
                start: new Date(y, m, d + 1),
                backgroundColor: '#f39c12',
                borderColor    : '#f39c12',
                allDay         : true
            },
        ]
    });
calendar.render();
});
</script>
@endsection
