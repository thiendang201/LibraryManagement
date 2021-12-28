@extends('admin.home')

@section('content')

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
@endsection
