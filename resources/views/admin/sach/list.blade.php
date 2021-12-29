@extends('admin.home')

@section('content')
    <div class="page-heading">
        <h3>Quản Lý Sách</h3>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <h4 class="card-title">Danh sách sách</h4>
                        </div>
                        <div class="col-12 col-lg-3 d-flex justify-content-end">
                            <a href="/admin/sach/add" class="btn btn-outline-info">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sách">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-lg table-hover-custom">
                                <thead>
                                <tr>
                                    <th style="width: 50px">ID</th>
                                    <th>Tên sách</th>
                                    <th>Mô tả</th>
                                    <th>Số lượng</th>
                                    <th>Tác giả</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Giá tiền</th>
                                    <th>Thể loại</th>
                                    <th>Ảnh minh hoạ</th>
                                    <th>Update</th>
                                    {{--                                    <th style="width: 100px">&nbsp;</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                {!! \App\Helpers\Helper::sach($saches) !!}
                                </tbody>
                            </table>
                            {!! $saches->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

