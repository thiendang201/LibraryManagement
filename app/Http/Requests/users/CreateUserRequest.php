<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'SDT' => 'required|digits:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này là bắt buộc!',
            'email.required' => 'Trường này là bắt buộc!',
            'SDT.required' => 'Trường này là bắt buộc!',
            'email.email'=> "Email không hợp lệ!",
            'email.unique'=> "Email này đã được sử dụng!",
            'SDT.digits'=> "Số điện thoại chỉ chứa số từ 0 - 9 và có 10 số!!",
        ];
    }
}
