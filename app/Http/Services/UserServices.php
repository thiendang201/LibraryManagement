<?php

namespace App\Http\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserServices
{
    public function getList()
    {
        return User::all(); //->paginate(2);
    }

    public function NewUsers(int $limit) {
        return User::orderbyDesc('ngayCapThe')->offset(0)->limit($limit)->get();
    }

    public function Create($request): bool
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = Carbon::now();

        try {
            DB::table('users')->insert(
                [
                    'name'=>(string) $request->input('name'),
                    'email'=>(string) $request->input('email'),
                    'SDT'=>(string) $request->input('SDT'),
                    'GioiTinh'=>(int) $request->input('gioiTinh'),
                    'diaChi'=>(string) $request->input('diaChi'),
                    'quyen'=>(int) $request->input('quyen'),
                    'ngayCapThe'=> $date,
                    'created_at' =>$date,
                    'password' => bcrypt('123456')
                ]
            );
        }
        catch (\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
}
