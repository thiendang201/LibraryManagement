<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserServices
{
    public function getList()
    {
        return User::all(); //->paginate(2);
    }

    public function NewUsers(int $limit) {
        return User::orderbyDesc('ngayCapThe')->offset(0)->limit($limit)->get();
    }
}
