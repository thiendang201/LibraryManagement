<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuMuon\CreatePMRequest;
use App\Http\Services\PhieuMuonServices;
use App\Http\Services\UserServices;
use App\Models\phieumuon;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhieuMuonController extends Controller
{
    private $pmService;

    public function __construct(PhieuMuonServices $pmService)
    {
        $this->pmService = $pmService;
    }

    private function makeActive()  {
        Session::flash('phieumuon', true);
        Session::forget('thongke');
        Session::forget('danhmuc');
        Session::forget('sach');
        Session::forget('nguoidung');
    }

    public function index() {
        $this->makeActive();
        $list=$this->pmService->GetList();
        return view('admin/PhieuMuon/list', [
            'title' => 'Quản lý phiếu mượn',
            'list' => $list,
            'sachs' => $this->pmService->GetSach()
        ]);
    }

    public function create() {
        return view('admin/PhieuMuon/add', [
            'title' => 'Thêm phiếu mượn',
            'users' =>  $this->pmService->getUser(),
            'saches' => $this->pmService->getSaches()
        ]);
    }

    public function store(CreatePMRequest $request) {

        $this->pmService->create($request);
        return redirect('admin/phieumuon/view');
    }

    public function show(phieumuon $phieumuon){
        $pm = $this->pmService->getPM($phieumuon->id);
        $pm->ngaymuon = Carbon::parse($pm->ngaymuon)->format('d/m/Y');
        $pm->ngayhentra = Carbon::parse($pm->ngayhentra)->format('d/m/Y');
        $listsach = $this->pmService->GetSachsById($phieumuon->id);

        foreach ($listsach as $key => $value) {
            if ($value->ngaytra != null) {
                $value->ngaytra = Carbon::parse($value->ngaytra)->format('d/m/Y');
            }
        }

        return view('admin/phieumuon/edit', [
            'title' => 'Cập nhật tình trang phiếu mượn',
            'phieumuon' => $pm,
            'saches' => $listsach
        ]);
    }

    public function update(phieumuon $phieumuon, Request $request)
    {
        $this->pmService->update($request, $phieumuon);
        return redirect('admin/phieumuon/view');

    }
        public function destroy(Request $request): JsonResponse
    {
        $result = $this->pmService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá phiếu mượn thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
