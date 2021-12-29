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
                            <input type="text" class="form-control" placeholder="Tìm kiếm người dùng">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class=" table table-lg table-hover-custom">
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

    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable  w-25" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Bạn có chắc muốn xóa không?
                    </h5>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hủy</span>
                    </button>
                    <button type="button" id="delete-user" class="btn btn-primary ml-1" data-id="" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Xóa</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
