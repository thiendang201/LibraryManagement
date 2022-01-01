@extends('admin.home')

@section('content')
    <p class="text-center nor-size" >Thống kê 30 ngày vừa qua</p>
    <div class="container custom-tk">
        <div class="div1" style="grid-area: div1">
            <div class="ic ic-grey">
                <i class="bi bi-sticky-fill"></i>
            </div>
            <div class="big-text">
                <h5 class="font-bold big-size m-0">{{$thongke->tongPMMoi}} +</h5>
                <p class="nor-size m-0 d-block">Phiếu mượn mới</p>
            </div>
        </div>
        <div class="div2" style="grid-area: div2">
            <div class="card-body-custom">
                <div>
                    <canvas id="PMChart" data-dangmuon="{{$thongke->soPMconHan}}" data-datra="{{$thongke->soPMDaTra}}"></canvas>
                </div>
                <h5 class="text-center mt-2">Biểu đồ phiếu mượn</h5>
            </div>
        </div>
        <div class="div3" style="grid-area: div3">
            <div class="card">
                <div class="card-header">
                    <h4>Top bạn đọc mới</h4>
                </div>
                <div class="card-content pb-4">
                    {!! \App\Helpers\Helper::newUsers($thongke->listNewUsers) !!}
                </div>
            </div>
        </div>
        <div class="div4" style="grid-area: div4">
            <div class="ic ic-light-blue">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <div class="big-text">
                <h5 class="font-bold big-size m-0">{{$thongke->tongBDMoi}} +</h5>
                <p class="nor-size m-0 d-block">Bạn đọc mới</p>
            </div>
        </div>
        <div class="div5" style="grid-area: div5">
            <h5>Phiếu mượn mới</h5>
            <div class="table-responsive">
                <table id="user-table" class="table table-lg table-hover-custom">
                    <thead>
                    <tr>
                        <th class="custom-size">NGƯỜI MƯỢN</th>
                        <th class="text-center custom-size">SÁCH ĐÃ MƯỢN</th>
                        <th class="text-center custom-size">NGÀY MƯỢN</th>
                    </tr>
                    </thead>
                    <tbody>
                    {!! \App\Helpers\Helper::PmMoi($thongke->listNewPMs , $thongke->saches) !!}
                    </tbody>
                </table>
                <div id="users-null" class="null-feedback"></div>
            </div>
        </div>
    </div>
@endsection
