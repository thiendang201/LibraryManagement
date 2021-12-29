<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sach\SachRequest;
use App\Http\Services\Sach\SachService;
use App\Models\sach;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SachController extends Controller
{
    protected $sachService;

    public function __construct(SachService $sachService)
    {
        $this->sachService = $sachService;
    }

    private function makeActive()  {
        Session::forget('danhmuc');
        Session::forget('nguoidung');
        Session::forget('thongke');
        Session::flash('sach', true);
        Session::forget('phieumuon');
    }

    //
    public function create()
    {
        return view('admin.sach.add', [
            'title' => 'Thêm sách mới',
            'danhMucs'=>$this->sachService->getDanhMuc()
        ]);
    }

    public function store(SachRequest $request)
    {
//        dd($request->input());
        $this->sachService->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        $this->makeActive();
        return view('admin.sach.list', [
            'title' => 'Danh sách sách',
            'saches' => $this->sachService->getAll()
        ]);
    }

    public function show(sach $sach){
        return view('admin.sach.edit', [
            'title' => 'Chỉnh sửa sách: ' . $sach->tenSach,
            'sach' => $sach,
            'danhMucs'=>$this->sachService->getDanhMuc()
        ]);
    }

    public function update(sach $sach, SachRequest $request){
        $result=$this->sachService->update($request, $sach);
        if ($result) {
            return redirect('/admin/sach/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->sachService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công sách'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
