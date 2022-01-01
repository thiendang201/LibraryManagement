@extends('admin.home')

@section('content')
    <div class="page-heading">
        <h3>Quản Lý Người Dùng</h3>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <h4 class="card-title">Danh sách người dùng</h4>
                        </div>
                        <div class="col-12 col-lg-3 d-flex justify-content-end">
                            <a href="/admin/users/add" class="btn btn-outline-info">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="search-user" class="form-control" placeholder="Tìm kiếm người dùng">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="user-table" class=" table table-lg table-hover-custom">
                                <thead>
                                <tr>
                                    <th>HỌ TÊN</th>
                                    <th class="text-center">SỐ ĐIỆN THOẠI</th>
                                    <th class="text-center">QUYỀN</th>
                                    <th class="text-center">THAO TÁC</th>
                                </tr>
                                </thead>
                                <tbody>
                                {!! \App\Helpers\Helper::users($list) !!}
                                </tbody>
                            </table>
                            <div id="users-null" class="null-feedback"></div>
                            {!! $list->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Bạn đọc mới</h4>
                </div>
                <div class="card-content pb-4">
                    {!! \App\Helpers\Helper::newUsers($newUsers) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
