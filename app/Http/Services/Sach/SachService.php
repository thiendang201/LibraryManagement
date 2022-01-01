<?php

namespace App\Http\Services\Sach;

use App\Models\danhmuc;
use App\Models\sach;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SachService
{
    public function getDanhMuc(){
        return danhmuc::all();
    }

    protected function isValidPrice($request){
        if ($request->input('gia')<=0){
            Session::flash('error', 'Giá sách phải lớn hơn 0');
            return false;
        }
        if ($request->input('soLuong')<=0){
            Session::flash('error', 'Số lượng sách phải lớn hơn 0');
            return false;
        }
        return true;
    }

    public function insert($request){
        $isValidPrice=$this->isValidPrice($request);
        if ($isValidPrice===false)
            return false;
//        dd($request->all());
        try {
            $request->except('_token');
            Sach::create($request->all());
            Session::flash('success', 'Thêm sách thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Thêm sách lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll(){
        return sach::with('danhmuc')
                        ->orderBy('id')->paginate(5);
    }

    public function update($request, $sach) : bool
    {
        $isValidPrice=$this->isValidPrice($request);
        if ($isValidPrice===false)
            return false;
        try{
            $sach->fill($request->input());
            $sach->save();
            Session::flash('success', 'Cập nhật sách thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật sách lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id=(int) $request->input('id');
        $sach=sach::where('id', $id)->first();
        if ($sach){
            return sach::where('id', $id)->delete();
        }
        return false;
    }

    public function search($request){
        $keyword = (string) $request->input('keyword');
        $rs =  DB::table('saches')
            ->join('danhmucs', 'danhmucs.id', 'danhMuc_id')
            ->where('tenSach', 'like', "%".$keyword."%")
            ->get(['saches.id', 'tenSach', 'moTa', 'soLuong', 'tacGia', 'NXB', 'gia', 'anhBia','tenDanhMuc']);

        return count($rs) == 0 ? null : $rs;
    }

}
