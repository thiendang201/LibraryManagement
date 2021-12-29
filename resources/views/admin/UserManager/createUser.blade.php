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
                            <img src="/template/admin/assets/images/faces/avt-nam.png" id="avt-user" alt="Face 1">
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="card">
                            <h4 class="card-title mb-md-3">Thông tin chung</h4>
                            <div class="card-content">
                                <div class="card-body padding-0">
                                    <form class="form form-vertical" method="POST" action="">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Họ tên</label>
                                                        <div class="position-relative visible-invalid">
                                                            <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Họ tên người dùng" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            @error('name') {{$message}} @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 form-group">
                                                    <label>Giới tính</label>
                                                    <div>
                                                        <input type="radio" class="btn-check" value="1" name="gioiTinh" id="gt-nam" autocomplete="off" checked="">
                                                        <label class="btn btn-outline-primary me-1" for="gt-nam">Nam</label>

                                                        <input type="radio" class="btn-check" value="0" name="gioiTinh" id="gt-nu" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="gt-nu">Nữ</label>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="basicSelect">Quyền</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="quyen">
                                                            <option value="0">Bạn đọc</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <h4 class="card-title mb-md-3 mt-lg-4">Thông tin liên lạc</h4>

                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="email-id-icon">Email</label>
                                                        <div class="position-relative visible-invalid">
                                                            <input type="text" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email của người dùng" id="email-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            @error('email') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="mobile-id-icon">Số điện thoại</label>
                                                        <div class="position-relative visible-invalid">
                                                            <input type="text" name="SDT" class="@error('SDT') is-invalid @enderror form-control" placeholder="Số điện thoại của người dùng" id="mobile-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-phone"></i>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            @error('SDT') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password-id-icon">Địa chỉ</label>
                                                        <div class="position-relative">
                                                            <input type="text" name="diaChi" class="form-control" placeholder="Địa chỉ của người dùng" id="password-id-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Thêm</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const nam = document.getElementById("gt-nam");
        const nu = document.getElementById("gt-nu");
        const avt = document.getElementById("avt-user");

        console.log(nam, nu, avt);

        nam.onclick = function () {
            avt.src = "/template/admin/assets/images/faces/avt-nam.png";
        }

        nu.onclick = function () {
            avt.src = "/template/admin/assets/images/faces/avt-nu.png";
        }
    </script>
@endsection
