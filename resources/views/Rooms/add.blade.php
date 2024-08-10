@extends('layouts.admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title d-flex justify-content-center text-center">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active ">
                    <h4><b>Thêm mới loại Phòng</b></h4>
                </li>
            </ul>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-4">
                <form action="{{ route('storeRoom') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <div class="mb-3">
                  <label class="form-label">ID</label>
                  <input type="number" class="form-control" placeholder="id hệ thống sẽ tự nhập" disabled >
                 
                </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Tên phòng</label>
                        <input type="text" class="form-control" placeholder="Nhập tên loại phòng" name="name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea cols="30" rows="5" class="form-control" name="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Loại Phòng</label>
                        <select name="KindRomm_id" class="form-control">
                            <option value="">Chọn loại phòng
                                @foreach ($KindRoomName as $kr)
                            <option value="{{ $kr->id }}">{{ $kr->KindRoom_name }}</option>
                            @endforeach
                            </option>
                        </select>
                    </div>


                    <button class="btn btn-warning mx-2"> <a href="{{ route('black') }}"
                            class="nav-link text-decoration-none">Quay lại</a> </button>

                    <input type="submit" class="btn btn-primary" value="Thêm mới">

                </form>
            </div>
        </div>
    </main>
@endsection
