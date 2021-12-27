
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
</head>

<body style="overflow-y: auto;">
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active ps ps--active-y">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="/template/admin/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item  ">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-bar-chart"></i>
                            <span>Thống Kê</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-grid"></i>
                            <span>QL Danh Mục</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-book"></i>
                            <span>QL Sách</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-card-list"></i>
                            <span>QL Phiếu Mượn</span>
                        </a>
                    </li>
                    <li class="sidebar-item active ">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-people"></i>
                            <span>QL Người Dùng</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 657px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 261px;"></div></div></div>
    </div>
    <div id="main">
        <div class="page-heading">
            <h3>Quản Lý Người Dùng</h3>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách người dùng</h4>
                    </div>

                    <div class="card-body" style="position: relative;">
                        <div class="table-responsive">
                            <table class="table table-lg table-hover-custom">
                                <thead>
                                <tr>
                                    <th>HỌ TÊN</th>
                                    <th>SỐ ĐIỆN THOẠI</th>
                                    <th>QUYỀN</th>
                                    <th>THAO TÁC</th>
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
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Bạn đọc mới</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/template/admin/assets/images/faces/4.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Hank Schrader</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/template/admin/assets/images/faces/5.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Dean Winchester</h5>
                                <h6 class="text-muted mb-0">@imdean</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/template/admin/assets/images/faces/1.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">John Dodol</h5>
                                <h6 class="text-muted mb-0">@dodoljohn</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
</body>
