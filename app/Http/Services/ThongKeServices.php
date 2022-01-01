<?php

namespace App\Http\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use stdClass;

class ThongKeServices
{
    public function getTK() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $date = $currentYear.'-'. $currentMonth .'-00';

        $thongke = new stdClass();
        $thongke->tongBDMoi = self::tongBDMoi($date)[0]->slBanDocMoi;
        $thongke->tongPMMoi = self::tongPMMoi($date)[0]->slPMMoi;
        $thongke->listNewUsers = self::NewUsers(5, $date);
        return $thongke;
    }

    private function tongBDMoi($date) {
        $query = "SELECT COALESCE(COUNT(id), 0) as slBanDocMoi FROM users WHERE created_at >= '".$date."'";
        return DB::select($query);
    }

    private function tongPMMoi($date) {
        $query = "SELECT COALESCE(COUNT(id), 0) as slPMMoi FROM phieumuons WHERE ngaymuon >= '".$date."'";
        return DB::select($query);
    }

    public function NewUsers($limit, $date) {
        return User::orderbyDesc('created_at')->offset(0)->limit($limit)->where('created_at', '>=', $date.'')->get();
    }
}
