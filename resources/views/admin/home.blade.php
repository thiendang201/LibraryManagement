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

                    <li class="sidebar-item {{Session::has('thongke') ? 'active' : ''}}">
                        <a href="/admin/thongke/view" class="sidebar-link">
                            <i class="bi bi-bar-chart"></i>
                            <span>Thống Kê</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{Session::has('danhmuc') ? 'active' : ''}} ">
                        <a href="/admin/danhmuc/list" class="sidebar-link">
                            <i class="bi bi-grid"></i>
                            <span>QL Danh Mục</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{Session::has('sach') ? 'active' : ''}} ">
                        <a href="/admin/sach/list" class="sidebar-link">
                            <i class="bi bi-book"></i>
                            <span>QL Sách</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{Session::has('phieumuon') ? 'active' : ''}} ">
                        <a href="/admin/phieumuon/view" class="sidebar-link">
                            <i class="bi bi-card-list"></i>
                            <span>QL Phiếu Mượn</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{Session::has('nguoidung') ? 'active' : ''}} ">
                        <a href="/admin/users/view" class="sidebar-link">
                            <i class="bi bi-people"></i>
                            <span>QL Người Dùng</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 657px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 261px;"></div>
            </div>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @include('admin.alert')

        <div class="page-content">
            @yield('content')
        </div>

    </div>
</div>

@include('admin.footer')
</body>
