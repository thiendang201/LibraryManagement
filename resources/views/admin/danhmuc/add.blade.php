@extends('admin.home')
@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm danh mục</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Tên danh mục</label>
                                </div>
{{--                                <div class="col-md-8 form-group">--}}
{{--                                    <input type="text" id="tenDanhMuc" class="form-control" name="tenDanhMuc" placeholder="Nhập tên danh mục">--}}
{{--                                </div>--}}
                                <div class="position-relative visible-invalid">
                                    <input type="text" class="@error('tenDanhMuc') is-invalid @enderror form-control" name="tenDanhMuc" placeholder="Nhập tên danh mục" id="first-name-icon">
                                </div>
                                <div class="invalid-feedback">
                                    @error('tenDanhMuc') {{$message}} @enderror
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Thêm mới</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Huỷ</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
    @endsection
