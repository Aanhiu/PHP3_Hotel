<style>
    .custom-form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-form-label {
        font-weight: bold;
    }

    .custom-form-control {
        border-radius: 5px;
    }

    .custom-form-button {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .custom-form-button:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .custom-form-heading {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
</style>
@extends('layouts.app')

@section('content')
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


    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="custom-form-container">
                <a href="{{route('dangkyUser')}}">  <h3 class="custom-form-heading text-center">Đến -> Đăng Ký</h3></a>
                <h2 class="custom-form-heading text-center">Đăng Nhập</h2>
               
            
                <form action="{{route('dangnhapUser')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="custom-form-label">Email</label>
                        <input type="email" class="form-control "placeholder="Nhập tên" required name="email" >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="custom-form-label">Mật khẩu</label>
                        <input type="password" class="form-control custom-form-control" placeholder="Nhập mật khẩu "
                            required name="password">
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-warning" value="Đăng nhập">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
