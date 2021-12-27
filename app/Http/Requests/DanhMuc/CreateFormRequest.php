<?php

namespace App\Http\Requests\DanhMuc;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'tenDanhMuc'=>'required'
        ];
    }
    public function messages() : array
    {
        return [
            'tenDanhMuc.required' => 'Vui lòng nhập tên danh mục'
        ];
    }

}
