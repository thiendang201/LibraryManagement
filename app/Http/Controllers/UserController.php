<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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
            'newUsers' => $this->userService->NewUsers(4)
        ]);
    }

    public function create() {
        return view('admin/UserManager/createUser', [
            'title' => 'Thêm người dùng'
        ]);
    }

    public function store(CreateUserRequest $request) {
        $this->userService->create($request);
        return redirect('admin/users/view');
    }

    public function show(User $user){
        return view('admin/UserManager/editUser', [
            'title' => 'Cập nhật thông tin người dùng ',
            'user' => $user
        ]);
    }

    public function update(User $user, UpdateUserRequest $request){
        $this->userService->update($request, $user);
        return redirect('admin/users/view');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->userService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá người dùng thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
