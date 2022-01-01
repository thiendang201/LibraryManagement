<?php

namespace App\Http\Controllers;

use App\Http\Services\ThongKeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThongKeController extends Controller
{
    private $tkService;

    public function __construct(ThongKeServices $tkService)
    {
        $this->tkService = $tkService;
    }

    private function makeActive()  {
        Session::flash('thongke', true);
        Session::forget('nguoidung');
        Session::forget('danhmuc');
        Session::forget('sach');
        Session::forget('phieumuon');
    }

    public function index() {
        $this->makeActive();
        return view('admin/ThongKe/view', [
            'title' => 'Thống kê',
            'thongke' => $this->tkService->getTK()
        ]);
    }
}
