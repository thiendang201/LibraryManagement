<?php

namespace App\Http\Controllers;

use App\Http\Services\PhieuMuonServices;
use Illuminate\Http\Request;

class PhieuMuonController extends Controller
{
    private $pmService;

    public function __construct(PhieuMuonServices $pmService)
    {
        $this->pmService = $pmService;
    }

    private function makeActive()  {
        Session::flash('phieumuon', true);
        Session::forget('thongke');
        Session::forget('danhmuc');
        Session::forget('sach');
        Session::forget('nguoidung');
    }

    public function index() {
        $this->makeActive();
        return view('admin/PhieuMuon/list', [
            'title' => 'Quản lý phiếu mượn',
            'list' => $this->userService->getList(),
            'newUsers' => $this->userService->NewUsers(4)
        ]);
    }
}
