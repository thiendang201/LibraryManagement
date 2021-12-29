<?php

namespace App\Http\Requests\Sach;

use Illuminate\Foundation\Http\FormRequest;

class SachRequest extends FormRequest
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
            'tenSach'=>'required'
        ];
    }
    public function messages() : array
    {
        return [
            'tenSach.required' => 'Vui lòng nhập tên sách'
        ];
    }
}
