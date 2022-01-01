<?php

namespace App\Http\Services;

use App\Models\sach;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use stdClass;

class ThongKeServices
{
    public function getTK() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = Carbon::now()->subDays(30);

        $thongke = new stdClass();
        $thongke->tongBDMoi = self::tongBDMoi($date)[0]->slBanDocMoi;
        $thongke->tongPMMoi = self::tongPMMoi($date)[0]->slPMMoi;
        $thongke->listNewUsers = self::NewUsers(5, $date);
        $thongke->listNewPMs = self::NewPMs(5, $date);
        $thongke->saches = self::getSaches();
        $thongke->soPMconHan = count(self::getPMChuaTraConHan($date));
        $thongke->soPMDaTra = count(self::getPMDaTra($date));

        return $thongke;
    }

    private function tongBDMoi($date) {
        $query = "SELECT COALESCE(COUNT(id), 0) as slBanDocMoi FROM users WHERE quyen <> 1 AND created_at >= '".$date."'";
        return DB::select($query);
    }

    private function tongPMMoi($date) {
        $query = "SELECT COALESCE(COUNT(id), 0) as slPMMoi FROM phieumuons WHERE ngaymuon >= '".$date."'";
        return DB::select($query);
    }

    public function NewUsers($limit, $date) {
        return User::orderbyDesc('created_at')->offset(0)->limit($limit)->where([
            ['created_at', '>=', $date.''],
            ['quyen', '<>', 1]
        ])->get();
    }

    public function NewPMs($limit, $date)
    {
        return DB::select('SELECT  u.id, u.name, u.GioiTinh ,pm.id , ngaymuon, ngayhentra, idNG
                                FROM phieumuons pm
                                JOIN users u on pm.idNG = u.id
                                JOIN chitietphieumuons ct on pm.id = ct.idPM
                                WHERE ngaymuon >= "'.$date.'"
                                GROUP BY u.id, u.name, u.GioiTinh ,pm.id , ngaymuon, ngayhentra, idNG
                                ORDER BY ngaymuon desc, pm.id desc
                                LIMIT 0, '.$limit);
    }

    public function getSaches(){
        return DB::table('saches')
            ->join('chitietphieumuons', 'idSach', '=', 'id')
            ->get(['idPM', 'tenSach', 'anhBia']);
    }

    public function getPMChuaTraConHan($date) {
        return DB::select('SELECT id as chuatra,
                COALESCE(COUNT(idPM), 0)
            FROM
                phieumuons pm
            JOIN chitietphieumuons ct ON
                pm.id = ct.idPM
            WHERE ngayTra IS NULL AND pm.ngayhentra >= CURRENT_DATE AND ngaymuon >= "'.$date.'"
            GROUP by id');
    }
    public function getPMDaTra($date) {
        return DB::select('SELECT  pm.id , ngaymuon, ngayhentra, COALESCE(datra, 0) as datra, COUNT(ct.idSach) tongsach
                                FROM phieumuons pm
                                JOIN users u on pm.idNG = u.id
                                JOIN chitietphieumuons ct on pm.id = ct.idPM
                                LEFT JOIN (SELECT idPM, COUNT(idSach) datra FROM `chitietphieumuons` WHERE ngayTra IS NOT NULL
                                GROUP BY idPM) dem on dem.idPM = pm.id
                                WHERE ngaymuon >= "'.$date.'"
                                GROUP BY pm.id , ngaymuon, ngayhentra, datra
                                HAVING datra = COUNT(ct.idSach)');
    }
}
