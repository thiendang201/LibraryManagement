<?php

namespace App\Http\Services\DanhMuc;

use App\Models\danhmuc;
use Illuminate\Support\Facades\Session;

class DanhMucService
{
    public function getAll(){
        return DanhMuc::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            DanhMuc::create([
                'tenDanhMuc'=>(string) $request->input('tenDanhMuc'),

            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        }
        catch (\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $DanhMuc) : bool
    {
//        $DanhMuc->fill($request->input());
//        $DanhMuc->save();
        if ($request->input('parent_id')!=$DanhMuc->id){
            $DanhMuc->parent_id=(int) $request->input('parent_id');
        }
        $DanhMuc->name=(string) $request->input('name');
        $DanhMuc->description=(string) $request->input('description');
        $DanhMuc->status=(string) $request->input('active');
        $DanhMuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request){
        $id=(int) $request->input('id');
        $DanhMuc=DanhMuc::where('id', $id)->first();
        if ($DanhMuc){
            return DanhMuc::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
}
