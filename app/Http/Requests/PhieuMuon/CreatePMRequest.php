<?php

namespace App\Http\Requests\PhieuMuon;

use Illuminate\Foundation\Http\FormRequest;

class CreatePMRequest extends FormRequest
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
    public function rules()
    {
        return [
            'userID' => 'required',
            'ngayhentra' => 'required|after_or_equal:today',
            'bookID_b1' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'userID.required' => 'Trường này là bắt buộc!',
            'ngayhentra.required' => 'Trường này là bắt buộc!',
            'bookID_b1.required' => 'Trường này là bắt buộc!',
            'ngayhentra.after_or_equal' => 'Ngày hẹn trả phải >= ngày mượn!',
        ];
    }
}
