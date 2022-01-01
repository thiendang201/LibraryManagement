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
            'tenSach'=>'required',
            'moTa'=>'required',
            'soLuong'=>'required|numeric',
            'tacGia'=>'required',
            'NXB'=>'required',
            'gia'=>'required|numeric',
            'danhMuc_id'=>'required',
            'anhBia'=>'required',
        ];
    }
    public function messages() : array
    {
        return [
            'tenSach.required' => 'Vui lòng nhập tên sách',
            'moTa.required' => 'Vui lòng nhập mô tả',
            'soLuong.required' => 'Vui lòng nhập số lượng',
            'tacGia.required' => 'Vui lòng nhập tác giả',
            'NXB.required' => 'Vui lòng nhập nhà xuất bản',
            'gia.required' => 'Vui lòng nhập giá',
            'danhMuc_id.required' => 'Vui lòng chọn thể loại',
            'anhBia.required' => 'Vui lòng chọn ảnh',
            'gia.numeric'=>'Vui lòng nhập số cho trường giá sách',
            'soLuong.numeric'=>'Vui lòng nhập số cho trường số lượng',
        ];
    }
}
