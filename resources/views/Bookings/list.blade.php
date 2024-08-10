@extends('layouts.admin.app')

@section('content')
    <main class="app-content" style="width: 1230px; height: 60px;">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <h4>Danh sách Đặt Phòng</h4>
                </li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="height: 100px">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">ID</th>
                                        <th>Tên người đặt</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Ảnh phòng</th>
                                        <th>Tên phòng</th>
                                        <th>Số người</th>
                                        <th>Ngày đến</th>
                                        <th>Ngày đi</th>
                                        <th>Phương thức</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành Động</th>
                                        <th>Xác nhận Checkin & Checkout</th>
                                    </tr>
                                </thead>

                                @foreach ($listBookAd as $B)
                                    <tbody>
                                        <tr>
                                            <td> {{ $B->id }} </td>
                                            <td> {{ $B->fullname }} </td>
                                            <td> {{ $B->email }} </td>
                                            <td> {{ $B->phone }} </td>
                                            <td style="width: 200px"> <img src="{{ asset('storage/' . $B->image) }}"
                                                    alt="Image" style="width: 200px">
                                            <td> {{ $B->name }} </td>
                                            <td> {{ $B->number_person }} </td>
                                            <td> {{ $B->check_in }} </td>
                                            <td> {{ $B->check_out }} </td>
                                            <td>{{ $B->pay }} </td>
                                            <td>{{ $B->total_price }} </td>

                                            <td><span class="badge">
                                                    @if ($B->status == 0)
                                                        <span style="color:lawngreen">Đã đặt phòng</span>
                                                    @elseif($B->status == 1)
                                                        <span style="color:yellow">Đã xác nhận <br> đặt phòng</span>
                                                    @elseif($B->status == 11)
                                                        <span style="color:yellow">Khách đã check IN</span>
                                                    @elseif($B->status == 22)
                                                        <span style="color:yellow">Khách đã check OUT</span>
                                                    @endif
                                                </span></td>
                                            <td>
                                                {{-- nut xoa loai phong theo id --}}
                                                <form action="{{route('adminDeleteBook' , $B->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm trash" type="submit"
                                                        title="Xóa" onclick=" return confirm('Bạn muốn xóa đơn BOOK chứ !!!')">
                                                        <i class="fas fa-trash-alt">Xóa BOOK</i>
                                                    </button>

                                                </form>
                                                <form action="{{route('xacnhanBook' , $B->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary btn-sm trash" type="submit"
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn muốn xác nhận Book đơn này ? ')">
                                                        <i class="fas fa-trash-alt">Xác nhận BOOK</i>
                                                    </button>

                                                </form>

                                            </td>

                                            <td>

                                                @if ($B->status == 11)
                                                <form action="{{route('admin_xacnhan_checkIN', $B->id )}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-success btn-sm trash" type="submit"
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn muốn xác nhận Check in này ? ')">
                                                        <i class="fas fa-trash-alt">Xác nhận Check In</i>
                                                    </button>

                                                </form>

                                                @elseif($B->status == 22)
                                                <form action="{{route('admin_xacnhan_checkOUT' , $B->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-warning btn-sm trash" type="submit"
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn muốn xác nhận Check out ? ')">
                                                        <i class="fas fa-trash-alt">Xác nhận Check Out</i>
                                                    </button>

                                                </form>
                                                @endif
                                                

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
