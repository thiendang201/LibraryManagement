@extends('admin.home')

@section('content')
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url()->previous() }}"><i class="bi bi-chevron-left"></i></a>
        </div>
    </nav>


    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Thêm người dùng mới</h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
