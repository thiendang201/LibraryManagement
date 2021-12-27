<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
class UserController extends Controller
{
    private $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        return view('admin/userManager', [
            'title' => 'Quản lý người dùng',
            'list' => $this->userService->getList()
        ]);
    }
}
