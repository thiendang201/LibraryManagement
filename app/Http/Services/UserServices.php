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
        return User::orderBy('id')->paginate(1);
    }

    public function NewUsers(int $limit) {
        return User::orderbyDesc('created_at')->offset(0)->limit($limit)->get();
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

    public function update($request, $user) : bool
    {
        $user->name= (string) $request->input('name');
        $user->email= (string) $request->input('email');
        $user->SDT=(string) $request->input('SDT');
        $user->GioiTinh=(int) $request->input('gioiTinh');
        $user->diaChi=(string) $request->input('diaChi');
        $user->quyen= (int) $request->input('quyen');
        $user->save();
        Session::flash('success', 'Cập nhật thành công');
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $user = User::where('id', $id)->first();
        if ($user){
            return User::where('id', $id)->delete();
        }
        return false;
    }

    public function search($request){
        $keyword = (string) $request->input('keyword');
        $rs = User::where('name', 'like', "%".$keyword."%")->get();

        return count($rs) == 0 ? null : $rs;
    }
}
