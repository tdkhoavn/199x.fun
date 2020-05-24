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
    var start = $this[0].selectionStart;
    var end = $this[0].selectionEnd;

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

$('.inpCount').each(function() {
    $(this).trigger('keyup');
});

$('#total').on('keyup', function() {
    add_unit($(this));
});

const datePickerSetting = {
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
}

const singleDatePickerSetting = {
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
};
