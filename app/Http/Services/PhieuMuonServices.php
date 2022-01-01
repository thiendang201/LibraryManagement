<?php

namespace App\Http\Services;

use App\Models\chitietphieumuon;
use App\Models\phieumuon;
use App\Models\sach;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\Translation\t;

class PhieuMuonServices
{
    public function GetList(): array
    {

        return DB::select('SELECT  u.id, u.name, u.GioiTinh ,pm.id , ngaymuon, ngayhentra, idNG, COALESCE(datra, 0) as datra, COUNT(ct.idSach) tongsach
FROM phieumuons pm
JOIN users u on pm.idNG = u.id
JOIN chitietphieumuons ct on pm.id = ct.idPM
LEFT JOIN (SELECT idPM, COUNT(idSach) datra FROM `chitietphieumuons` WHERE ngayTra IS NOT NULL
GROUP BY idPM) dem on dem.idPM = pm.id
GROUP BY u.id, u.name, u.GioiTinh ,pm.id , ngaymuon, ngayhentra, idNG, datra');

    }

    public function GetSach() {
        return DB::table('saches')
            ->join('chitietphieumuons', 'idSach', '=', 'id')
            ->get(['idPM', 'tenSach', 'anhBia']);
    }

    public function GetSachsById($id) {
        return DB::table('saches')
            ->join('chitietphieumuons', 'idSach', '=', 'id')
            ->where('idPM', '=', $id)
            ->get(['idPM', 'idSach', 'tenSach', 'anhBia', 'ngaytra']);
    }

    public function getUser()
    {   $raw = $this->GetList();
        $list = [];
        foreach ($raw as $key => $value) {
            if($value->datra < $value->tongsach) {
                $list[$key] = $value;
                unset($raw[$key]);
            }
        }
        foreach ($list as $key => $value) {
            foreach ($raw as $key2 => $value2) {
                if($value->name == $value2->name)
                    unset($raw[$key2]);
            }
        }

        return $raw;
    }

    public function getSaches(){
        return sach::all();
    }

    private function InsertChiTietPM($pmID , $bookID) {
        try {
            DB::table('chitietphieumuons')->insert(
                [
                    'idPM'=> $pmID,
                    'idSach'=> $bookID
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

    public function Create($request): bool
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = Carbon::now();

        try {
            DB::table('phieumuons')->insert(
                [
                    'idNG'=>(int) $request->input('userID'),
                    'ngaymuon'=> $date,
                    'ngayhentra'=> $request->input('ngayhentra')
                ]
            );

            $idPM = DB::table('phieumuons')
                ->where([
                    ['idNG', '=', $request->input('userID')],
                    ['ngaymuon', '=',  $date->format('Y-m-d')]
                ])
                ->first('id');

            $sach1 = (int) $request->input('bookID_b1');
            $sach2 = (int) $request->input('bookID_b2');
            $sach3 = (int) $request->input('bookID_b3');

            if ($sach1 != null)
                $this->InsertChiTietPM($idPM->id, $sach1);
            if ($sach2 != null)
                $this->InsertChiTietPM($idPM->id, $sach2);
            if ($sach3 != null)
                $this->InsertChiTietPM($idPM->id, $sach3);
        }
        catch (\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    private function setNgayTra($idPM, $idSach) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = Carbon::now();

       $s1 = DB::table('chitietphieumuons')->where([
            ['idPM', '=', $idPM],
            ['idSach', '=', $idSach]
        ])->first();

        if($s1->ngayTra == null) {
            DB::table('chitietphieumuons')
                ->where([
                    ['idPM', '=', $idPM],
                    ['idSach', '=', $idSach]
                ])
                ->update(['ngayTra' => $date]);
            return true;
        }
        return false;
    }

    public function update($request, $phieumuon) : bool
    {
        $sach1 = (int) $request->input('sach1');
        $sach2 = (int) $request->input('sach2');
        $sach3 = (int) $request->input('sach3');
        $rs = false;

        if ($sach1 != null) {
            $rs = $this->setNgayTra($phieumuon->id, $sach1);
        }
        if ($sach2 != null)
            $rs = $this->setNgayTra($phieumuon->id, $sach2);
        if ($sach3 != null)
            $rs = $this->setNgayTra($phieumuon->id, $sach3);

        if ($rs)
            Session::flash('success', 'Cập nhật thành công');

        return true;
    }

    public function destroy($request): bool
    {
        $id = (int) $request->input('id');
        $pm = phieumuon::where('id', $id)->first();
        if ($pm){
            phieumuon::where('id', $id)->delete();
            return true;
        }
        return false;
    }

    public function getPM($id) {
        return DB::table('phieumuons')
            ->join('chitietphieumuons', 'idPM', '=', 'phieumuons.id')
            ->join('users', 'idNG', '=', 'users.id')
            ->where('phieumuons.id', '=', $id)
            ->first(['idPM', 'users.name', 'users.GioiTinh', 'phieumuons.ngaymuon', 'phieumuons.ngayhentra']);
    }
}
