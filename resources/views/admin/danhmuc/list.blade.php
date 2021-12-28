@extends('admin.home')

@section('content')
    <div class="table-responsive">
        <table class="table table-lg table-hover-custom">
            <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên danh mục</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            {!! \App\Helpers\Helper::danhMuc($danhMucs) !!}
            </tbody>
        </table>
    </div>
@endsection

