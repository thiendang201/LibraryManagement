<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    private function makeActive()  {
        Session::flash('nguoidung', true);
        Session::forget('thongke');
        Session::forget('danhmuc');
        Session::forget('sach');
        Session::forget('phieumuon');
    }

    public function index() {
        $this->makeActive();
        return view('admin/UserManager/userManager', [
            'title' => 'Quản lý người dùng',
            'list' => $this->userService->getList(),
            'newUsers' => $this->userService->NewUsers(3)
        ]);
    }
}
