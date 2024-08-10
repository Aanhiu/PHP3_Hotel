@extends('layouts.admin.app')

@section('content')
<main class="app-content">
    <div class="app-title d-flex justify-content-center text-center">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active "><h4><b>Thêm mới loại Phòng</b></h4></li>
        </ul>

    </div>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-4">
            <form action="{{route('updateKindRooms' , $KindRoomsID->id)}}" method="POST">
              @csrf
              @method('PUT')
               <input type="text" hidden value="{{$KindRoomsID->id}}">
                <div class="mb-3">
                  <label class="form-label">Tên Loại Phòng</label>
                  <input type="text" class="form-control" placeholder="Nhập tên loại phòng"  name="name" required value="{{$KindRoomsID->name}}">
                </div>

                <div class="mb-3">
                  <label class="form-label">Mô tả</label>
                 <textarea cols="30" rows="5" class="form-control" name="description" required >{{$KindRoomsID->description}}</textarea>
                </div>


                <button class="btn btn-warning mx-2"> <a href="{{route('black')}}" class="nav-link text-decoration-none">Quay lại</a> </button>

                <input type="submit" class="btn btn-primary" value="Cập Nhật" >
                 
              </form>
        </div>
    </div>
</main>
@endsection