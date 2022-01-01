@extends('admin.home')

@section('content')
    <div class="page-heading">
        <h3>Quản Lý Danh Mục</h3>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <h4 class="card-title">Danh sách danh mục</h4>
                        </div>
                        <div class="col-12 col-lg-3 d-flex justify-content-end">
                            <a href="/admin/danhmuc/add" class="btn btn-outline-info">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" id="search-danhMuc" class="form-control" placeholder="Tìm kiếm danh mục">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="danhMuc-table" class="table table-lg table-hover-custom">
                                <thead>
                                <tr>
                                    <th style="width: 50px">STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Update</th>
{{--                                    <th style="width: 100px">&nbsp;</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                {!! \App\Helpers\Helper::danhMuc($danhMucs) !!}
                                </tbody>
                            </table>
                            <div id="danhMucs-null" class="null-feedback"></div>

                        </div>

                    </div>
                    {!! $danhMucs->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

