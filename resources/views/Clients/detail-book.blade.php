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

            <h2 class="mb-4">Chi tiết đơn đặt phòng</h2>
            @if ($listBookUser->isEmpty())
                <h5> Không có phòng nào được đặt </h5>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Số đặt</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Số người</th>
                            <th>Ngày Đến</th>
                            <th>Ngày Đi</th>
                            <th>Tên Phòng</th>
                            <th>Ảnh Phòng</th>
                            <th>Tổng tiền</th>
                            <th>Phương thức</th>
                            <th>Trạng Thái</th>
                            <th>Thao tác</th>
                            <th>Checkin & Checkout</th>
                        </tr>
                    </thead>
                    @foreach ($listBookUser as $B_user)
                        <tbody>
                            <tr>
                                <td> {{ $B_user->id }} </td>
                                <td> {{ $B_user->fullname }} </td>
                                <td> {{ $B_user->email }} </td>
                                <td> {{ $B_user->phone }} </td>
                                <td> {{ $B_user->number_person }} </td>
                                <td> {{ $B_user->check_in }} </td>
                                <td> {{ $B_user->check_out }} </td>
                                <td> {{ $B_user->Room_name }}</td>
                                <td style="width: 200px"> <img src="{{ asset('storage/' . $B_user->Room_image) }}"
                                        alt="Image" style="width: 200px">
                                <td>{{ $B_user->total_price }} VND</td>
                                <td>{{ $B_user->pay }} </td>
                                <td>
                                    @if ($B_user->status == 0)
                                        <span style="color: red"> Chờ xác nhận</span>
                                    @elseif($B_user->status == 1)
                                        <span style="color: blue"> Đã xác nhận đặt</span>
                                    @elseif($B_user->status == 11)
                                        <span style="color: blue">Chờ xác nhận check IN</span>
                                    @elseif($B_user->status == 22)
                                        <span style="color: blue">Chờ xác nhận check OUT</span>
                                    @elseif($B_user->status == 33)
                                        <span style="color: blue"> Đã xác nhận Check IN</span>
                                    @elseif($B_user->status == 44)
                                        <span style="color: blue"> Đã xác nhận Check OUT</span>
                                    @endif
                                </td>
                                <td class="">
                                    <a href="#" class="btn btn-info btn-sm">Xem</a>
                                    {{-- <a href="#" class="btn btn-warning btn-sm">Sửa</a> --}}

                                    @if ($B_user->status == 0)
                                    <form action="{{route('userHUYbook', $B_user->id )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm trash" type="submit" title="Xóa"
                                            onclick="return confirm('Bạn muốn hủy BOOK ? ')">
                                            <i class="fas fa-trash-alt">Hủy BOOK</i>
                                        </button>
                                    </form>
                                    @elseif($B_user->status == 1)
                                        {{-- <a href="#" class="btn btn-danger btn-sm" style="display: block ">Hủy Đặt</a> --}}
                                    @endif
                                </td>

                                <td>
                                    @if ($B_user->status == 1)
                                        <form action="{{ route('user_CheckIN', $B_user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success btn-sm trash" type="submit" title="Xóa"
                                                onclick="return confirm('Bạn muốn check in ? ')">
                                                <i class="fas fa-trash-alt">Check in</i>
                                            </button>

                                        </form>
                                    @elseif($B_user->status == 33)
                                        <form action="{{ route('user_CheckOUT', $B_user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-warning btn-sm trash" type="submit" title="Xóa"
                                                onclick="return confirm('Bạn muốn check out ? ')">
                                                <i class="fas fa-trash-alt">Check out</i>
                                            </button>

                                        </form>
                                    @elseif($B_user->status == 44)
                                        <span>Đã hoàn thành đặt phòng ở Hotel tạm biệt bạn</span>
                                        <form action="{{ route('userDeleteBook', $B_user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm trash" type="submit" title="Xóa"
                                                onclick="return confirm('Bạn muốn xóa lịch xử đơn BOOK này ? ')">
                                                <i class="fas fa-trash-alt">Xóa đơn BOOK</i>
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>

                        </tbody>
                    @endforeach

                </table>
            @endif


        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
