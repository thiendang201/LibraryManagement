<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin/users/login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    private function makeActive()  {
        Session::flash('thongke', true);
        Session::forget('nguoidung');
        Session::forget('danhmuc');
        Session::forget('sach');
        Session::forget('phieumuon');
    }

    public function store(Request $request)
    {
//        dd($request->input());
        $this->validate($request, [
            'email'=> 'required|email:filter',
            'password'=> 'required'
        ],
        [
            'email.required'=>'Bạn phải nhập email',
            'password.required'=>'Bạn phải nhập password'
        ]);
        if (Auth::attempt([
            'email'=>$request-> input('email'),
            'password'=>$request->input('password')
        ], $request->input('remember'))){
            $this->makeActive();
//            dd($this->getUser($request));
            $role=$this->getUser($request);
            if ($role==1)
                return redirect('/admin/thongke/view');
            else{
                Session::flash('error', 'Vui lòng đăng nhập với tài khoản admin');
                return redirect()->back();
            }

        }
        Session::flash('error', 'Email hoặc mật khẩu không chính xác');
        return redirect()->back();
    }

    public function getUser(Request $request){
        $id=(String) $request->input('email');
        $user=User::where('email', $id)->first();
        return $user->quyen;
    }
}
