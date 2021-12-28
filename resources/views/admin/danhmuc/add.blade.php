@extends('admin.home')
@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="" method="POST">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="tenDanhMuc" class="form-control" name="tenDanhMuc" placeholder="Nhap ten danh muc">
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
    @endsection
