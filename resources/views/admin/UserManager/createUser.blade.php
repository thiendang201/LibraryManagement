@extends('admin.home')

@section('content')
    <nav class="navbar-light mb-10">
        <div class="container d-block">
            <a href="{{ url()->previous() }}"><i class="bi bi-chevron-left"></i></a>
        </div>
    </nav>

    <div class="page-heading custom-padding-inline">
        <h3>Thêm người dùng mới</h3>
    </div>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body pt-lg-5">
                <div class="row">
                    <div class="col-12 col-lg-5 d-flex justify-content-center">
                        <div class="avatar avatar-custom">
                            <img src="/template/admin/assets/images/faces/avt-nam.png" alt="Face 1">
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="card">
                            <h4 class="card-title mb-md-4">Thông tin chung</h4>
                            <div class="card-content">
                                <div class="card-body padding-0">
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Họ tên</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Họ tên người dùng mới" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label>Giới tính</label>

                                                    <div>
                                                        <input type="radio" class="btn-check" value="1" name="gioiTinh" id="success-outlined" autocomplete="off" checked="">
                                                        <label class="btn btn-outline-info" for="success-outlined">Nam</label>

                                                        <input type="radio" class="btn-check" value="0" name="gioiTinh" id="danger-outlined" autocomplete="off">
                                                        <label class="btn btn-outline-info" for="danger-outlined">Nữ</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <div class="form-group has-icon-left">
                                                        <label for="email-id-icon">Email</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Email" id="email-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="mobile-id-icon">Mobile</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password-id-icon">Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" placeholder="Password" id="password-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <div class="checkbox mt-2">
                                                            <input type="checkbox" id="remember-me-v" class="form-check-input" checked="">
                                                            <label for="remember-me-v">Remember Me</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
