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

    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="custom-form-container">
              <a href="{{route('dangnhapUser')}}">  <h3 class="custom-form-heading text-center">Đến -> Đăng Nhập</h3></a>
                <h2 class="custom-form-heading text-center">Đăng Ký</h2>
                <form action="{{route('dangkyUser')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="custom-form-label">Tên</label>
                        <input type="text" class="form-control "placeholder="Nhập tên" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="custom-form-label">Email</label>
                        <input type="email" class="form-control custom-form-control" name="email" placeholder="Nhập email " required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="custom-form-label">Phone</label>
                        <input type="text" class="form-control custom-form-control" name="phone" placeholder="Nhập số điện thoại " required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="custom-form-label">Mật khẩu</label>
                        <input type="password" class="form-control custom-form-control" name="password" placeholder="Nhập mật khẩu " required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-success" value="Đăng Ký"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
