@extends('layouts.app')
<style>
    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table .actions {
        display: flex;
        justify-content: center;
    }

    .table .actions .btn {
        margin: 0 5px;
    }
</style>
@section('content')
    <div class="row justify-content-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hiển thị thông báo lỗi -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="col-sm-10">
            <h1>Thông tin tài khoản</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$getUserID->name}}</td>
                        <td>{{$getUserID->email}}</td>
                        <td>{{$getUserID->phone}}</td>
                        {{-- <td>{{$getUserID->role}}</td> --}}
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                           {{-- @if ($getUserID->role == 1)
                           <a href="{{route('admin')}}" class="btn btn-warning btn-sm">Vào Admin</a>
                           @endif --}}
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
