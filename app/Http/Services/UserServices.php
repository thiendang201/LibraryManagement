<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserServices
{
    public function getList()
    {
        return User::orderbyDesc('ngayCapThe')->paginate(2);
    }
}
