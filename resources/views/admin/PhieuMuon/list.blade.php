@extends('admin.home')

@section('content')
    <div class="page-heading">
        <h3>Quản Lý Phiếu mượn</h3>
    </div>
    <div class="card">
        <div class="card-header mb-sm-4">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <h4 class="card-title">Danh sách phiếu mượn</h4>
                </div>
                <div class="col-12 col-lg-3 d-flex justify-content-end">
                    <a href="/admin/phieumuon/add" class="btn btn-outline-info">Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group position-relative has-icon-left mb-sm-4">
                <input type="text" id="search-pm" class="form-control" placeholder="Tìm kiếm phiếu mượn">
                <div class="form-control-icon">
                    <i class="bi bi-search"></i>
                </div>
            </div>
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="dangmuon-tab" data-bs-toggle="tab" href="#dangmuon" role="tab" aria-controls="dangmuon" aria-selected="true">Đang mượn</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="datrasach-tab" data-bs-toggle="tab" href="#datrasach" role="tab" aria-controls="datrasach" aria-selected="false">Đã trả sách</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="dangmuon" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                        <table id="dangmuon-table" class="table table-lg table-hover-custom">
                            <thead>
                            <tr>
                                <th>NGƯỜI MƯỢN</th>
                                <th class="text-center">SÁCH ĐÃ MƯỢN</th>
                                <th class="text-center">ĐÃ TRẢ</th>
                                <th class="text-center">NGÀY MƯỢN - HẸN TRẢ</th>
                                <th class="text-center">THAO TÁC</th>
                            </tr>
                            </thead>
                            <tbody>
                            {!! \App\Helpers\Helper::dsPhieuMuon($list, 0, $sachs) !!}
                            </tbody>
                        </table>
                        <div id="dangmuon-null" class="null-feedback"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="datrasach" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table id="datrasach-table" class="table table-lg table-hover-custom">
                            <thead>
                            <tr>
                                <th>NGƯỜI MƯỢN</th>
                                <th class="text-center">SÁCH ĐÃ MƯỢN</th>
                                <th class="text-center">ĐÃ TRẢ</th>
                                <th class="text-center">NGÀY MƯỢN - HẸN TRẢ</th>
                                <th class="text-center">THAO TÁC</th>
                            </tr>
                            </thead>
                            <tbody>
                            {!! \App\Helpers\Helper::dsPhieuMuon($list, 1, $sachs) !!}
                            </tbody>
                        </table>
                        <div id="datrasach-null" class="null-feedback"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
