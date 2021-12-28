
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
</head>

<body>
<div id="auth">

    <div class="d-flex justify-content-center ">
        <div class="col-lg-4 col-12">
            <div >
                <h1 class="auth-title mb-10 mt-10">Đăng Nhập</h1>
                @include('admin.alert')
                <form action="./login/store" method="POST">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Nhớ mật khẩu
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng nhập</button>
                    @csrf
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Chưa có tài khoản? <a href="auth-register.html" class="font-bold">Đăng ký</a>.</p>
                    <p><a class="font-bold" href="auth-forgot-password.html">Quên mật khẩu?</a>.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.footer')
</body>

</html>
