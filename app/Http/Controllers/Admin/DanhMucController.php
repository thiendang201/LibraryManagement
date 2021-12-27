<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMuc\CreateFormRequest;
use App\Http\Services\DanhMuc\DanhMucService;
use App\Models\danhmuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    protected $danhMucService;

    public function __construct(DanhMucService $danhMucService)
    {
        $this->danhMucService = $danhMucService;
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
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.danhmuc.list', [
            'title' => 'Danh sách danh mục',
            'danhMucs' => $this->danhMucService->getAll()
        ]);
    }

    public function show(danhmuc $danhMuc){
        return view('admin.danhmuc.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $danhMuc->tenDanhMuc,
            'danhMuc' => $danhMuc,
            'danhMucs' => $this->danhMucService->getParent()
        ]);
    }

    public function update(Category $category, CreateFormRequest $request){
        $this->danhMucService->update($request, $category);
        return redirect('/admin/category/list');
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
}
