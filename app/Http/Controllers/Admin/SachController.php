<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sach\CreateFormRequest;
use App\Http\Services\Sach\SachService;
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
        Session::flash('danhmuc');
        Session::forget('nguoidung');
        Session::forget('thongke');
        Session::forget('sach', true);
        Session::forget('phieumuon');
    }

    //
    public function create()
    {
        return view('admin.sach.add', [
            'title' => 'Thêm sách mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
//        dd($request->input());
        $this->sachService->create($request);
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
}
