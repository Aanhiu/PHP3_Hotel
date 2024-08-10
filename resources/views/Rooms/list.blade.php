@extends('layouts.admin.app')

@section('content')
    <main class="app-content" style="width: 1230px; height: 60px;">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <h4>Danh sách Loại Phòng</h4>
                </li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="height: 100px">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" href="{{route('addRoom')}}" title="Thêm">
                                    <i class="fas fa-plus"></i> Thêm mới Loại Phòng
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>

                                        <th style="width: 40px">ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>KindRoom</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>

                                @foreach ($getListRooms as $R)
                                    <tbody>
                                        <tr>
                                            <td> {{ $R->id }} </td>
                                            <td> {{ $R->name }} </td>
                                            <td style="width: 200px"> <img src="{{ asset('storage/'. $R->image) }}" alt="Image" style="width: 200px">
                                            <td> {{ $R->price }} </td>
                                            <td> {{ $R->description }} </td>

                                            <td><span class="badge bg-success">
                                                    @if ($R->status == 0)
                                                        Có thể thuê
                                                    @endif
                                                </span></td>

                                            <td>{{$R->KindRoom_name}} </td>
                                            <td>
                                                {{-- nut xoa loai phong theo id --}}
                                                <form action="{{route('deleteRoom' , $R->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm trash" type="submit"
                                                        title="Xóa" onclick="confirm('Bạn muốn xóa chứ')">
                                                        <i class="fas fa-trash-alt">Xóa</i>
                                                    </button>

                                                </form>

                                                {{-- nut sua loai phong theo id --}}
                                                <a href="{{route('editRoom' , $R->id)}}"> <button class="btn btn-primary btn-sm edit"
                                                        type="button" title="Sửa"><i
                                                            class="fas fa-edit">Sửa</button></a></i>
                                            </td>
                                        </tr>
                                        <!-- xuat  -->
                                    </tbody>
                                @endforeach





                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
