@extends('admin.home')

@section('content')
    <nav class="navbar-light mb-10">
        <div class="container d-block">
            <a href="{{ url()->previous() }}"><i class="bi bi-chevron-left"></i></a>
        </div>
    </nav>

    <div class="page-heading custom-padding-inline">
        <h3>Cập nhật tình trang phiếu mượn</h3>
    </div>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body pt-lg-5">
                <form class="form form-vertical" method="POST" action="">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12 col-lg-5 d-flex flex-column">
                                <h4 class="card-title mb-md-3">Thông tin chung</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class=" badge bg-light-danger">phiếu #{{$phieumuon->idPM}}</span>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-3 mt-2 label">Người mượn:</div>
                                    <div class="col-md-9 mt-2 d-flex align-items-center position-relative">
                                        <div class="avatar avatar-lg">
                                            @if($phieumuon->GioiTinh == 1)
                                                <img src="/template/admin/assets/images/faces/avt-nam.png" id="avt-user" alt="Face 1">
                                            @else
                                                <img src="/template/admin/assets/images/faces/avt-nu.png" id="avt-user" alt="Face 1">
                                            @endif
                                        </div>
                                        <p class="font-bold ms-3 mb-0">{{$phieumuon->name}}</p>
                                    </div>
                                    <div class="col-md-3 mt-2 label">Ngày mượn:</div>
                                    <div class="col-md-9 mt-2 "><strong>{{$phieumuon->ngaymuon}}</strong></div>
                                    <div class="col-md-3 mt-2 label">Hẹn trả:</div>
                                    <div class="col-md-9 mt-2"><strong>{{$phieumuon->ngayhentra}}</strong></div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body padding-0">
                                            <h4 class="card-title mb-md-3">Sách mượn</h4>
                                            <div class="row">
                                               {!! \App\Helpers\Helper::sachMuon($saches) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Cập nhật</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

