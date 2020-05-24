<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class EventRequest extends CommonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function all($key = null)
    {
        $attributes = parent::all();

        return $attributes;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date_format:d-m-Y',
            'member_id'  => 'nullable|array',
            'type_id'    => 'required|exists:event_types,id',
            'total'      => 'required|regex:/^((?:\d{1,3}[,\.]?)+\d*)$/',
            'note'       => 'max:1000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'start_date.required'       => 'Vui lòng nhập Ngày diễn ra.',
            'start_date.date_format'    => 'Vui lòng nhập Ngày diễn ra đúng định dạng :format.',
            'member_id.array'           => 'Vui lòng nhập Nguời tham gia đúng định dạng.',
            'type_id.required'          => 'Vui lòng chọn Thể loại.',
            'type_id.exists'            => 'Thể loại không tồn tại.',
            'total.required'            => 'Vui lòng nhập Tổng số tiền.',
            'total.regex'               => 'Vui lòng nhập Tổng số tiền đúng định dạng.',
            'note.max'                  => 'Ghi chú không đuợc quá :max ký tự.',
        ];
    }
}
