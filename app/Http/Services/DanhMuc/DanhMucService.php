<?php

namespace App\Http\Services\DanhMuc;

use App\Models\danhmuc;
use Illuminate\Support\Facades\Session;

class DanhMucService
{
    public function getAll(){
        return DanhMuc::orderBy('id')->paginate(10);
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
        $DanhMuc->tenDanhMuc=(string) $request->input('tenDanhMuc');
        $DanhMuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request){
        $id=(int) $request->input('id');
        $danhMuc=DanhMuc::where('id', $id)->first();
        if ($danhMuc){
            return DanhMuc::where('id', $id)->delete();
        }
        return false;
    }

    public function search($request){
        $keyword = (string) $request->input('keyword');
        $rs = danhmuc::where('tenDanhMuc', 'like', "%".$keyword."%")->get();

        return count($rs) == 0 ? null : $rs;
    }
}
