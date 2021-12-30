<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMuc\CreateFormRequest;
use App\Http\Services\DanhMuc\DanhMucService;
use App\Models\danhmuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DanhMucController extends Controller
{
    protected $danhMucService;

    public function __construct(DanhMucService $danhMucService)
    {
        $this->danhMucService = $danhMucService;
    }

    private function makeActive()  {
        Session::flash('danhmuc', true);
        Session::forget('nguoidung');
        Session::forget('thongke');
        Session::forget('sach');
        Session::forget('phieumuon');
    }

    //
    public function create()
    {
        return view('admin.danhmuc.add', [
            'title' => 'Thêm danh mục mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
//        dd($request->input());
        $this->danhMucService->create($request);
        return redirect('admin/danhmuc/list');
    }

    public function index()
    {
        $this->makeActive();
        return view('admin.danhmuc.list', [
            'title' => 'Danh sách danh mục',
            'danhMucs' => $this->danhMucService->getAll()
        ]);
    }

    public function show(danhmuc $danhMuc){
        return view('admin.danhmuc.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $danhMuc->tenDanhMuc,
            'danhMuc' => $danhMuc
        ]);
    }

    public function update(danhmuc $danhMuc, CreateFormRequest $request){
        $this->danhMucService->update($request, $danhMuc);
        return redirect('/admin/danhmuc/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->danhMucService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $result = $this->danhMucService->search($request);
        return response()->json([
            'list' => $result,
            'message' => $result != null  ? "" : "Không tìm thấy danh mục nào!",
            'keyword' => $request->input('keyword').gettype($result)
        ]);
    }
}
