@extends('layouts.admin.app')

@section('content')
    <main class="app-content">
        <div class="app-title d-flex justify-content-center text-center">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active ">
                    <h4><b>Edit loại Phòng</b></h4>
                </li>
            </ul>
        </div>

        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-4">
                <form action="{{ route('updateRoom', $getRoomID->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="text" value="{{ $getRoomID->id }}" hidden>

                    <div class="mb-3">
                        <label class="form-label">Tên phòng</label>
                        <input type="text" class="form-control" placeholder="Nhập tên loại phòng" name="name" required value="{{ $getRoomID->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ảnh</label>
                        <input type="file" class="form-control" name="image">
                        @if ($getRoomID->image)
                            <div class="mt-2">
                                <p><strong>Ảnh hiện tại:</strong> {{ basename($getRoomID->image) }}</p>
                                <img src="{{ asset('storage/' . $getRoomID->image) }}" alt="{{ $getRoomID->name }}" width="100">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá" required value="{{ $getRoomID->price }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea cols="30" rows="5" class="form-control" name="description" required>{{ $getRoomID->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Loại Phòng</label>
                        <select name="KindRomm_id" class="form-control">
                            @foreach ($KindRoomName as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->id == $getRoomID->KindRomm_id ? 'selected' : '' }}>
                                    {{ $cate->Kr_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-warning mx-2"> <a href="{{ route('black') }}" class="nav-link text-decoration-none">Quay lại</a> </button>
                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                </form>
            </div>
        </div>
    </main>
@endsection
