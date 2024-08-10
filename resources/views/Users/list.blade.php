@extends('layouts.admin.app')

@section('content')
    <main class="app-content" style="width: 1230px; height: 60px;">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active">
                    <h4>Quản lí người dùng</h4>
                </li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="height: 100px">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                        </div>
                        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Quyền</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>

                                @foreach ($getallUser as $U)
                                    <tbody>
                                        <tr>
                                            <td> {{ $U->id }} </td>
                                            <td> {{ $U->name }} </td>
                                            <td> {{ $U->email }} </td>
                                            <td> {{ $U->phone }} </td>
                                            <td>
                                                @if ($U->role == 0)
                                                    Người dùng
                                                @else
                                                    <span style="color: red">Admin</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- xoa user theo id --}}
                                                <form action="{{ route('deleteUser', $U->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm trash" type="submit"
                                                        title="Xóa" onclick="confirm('Bạn muốn xóa người dùng này chứ')">
                                                        <i class="fas fa-trash-alt">Xóa User</i>
                                                    </button>
                                                </form>

                                                {{-- cap quyen theo id theo id --}}
                                                @if ($U->role == 0)
                                                    <form action="{{ route('updateRole_admin', $U->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" value="{{ $U->id }}" hidden>
                                                        <button class="btn btn-primary btn-sm trash" type="submit"
                                                            title="Xóa"
                                                            onclick="confirm('Bạn muốn cấp quyền ADMIN chứ')">
                                                            <i class="fas fa-trash-alt">Cấp quyền ADMIN</i>
                                                        </button>
                                                    </form>
                                                    @elseif($U->role == 1)
                                                        <form action="{{ route('updateRole_user', $U->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" value="{{ $U->id }}" hidden>
                                                            <button class="btn btn-warning btn-sm trash" type="submit"
                                                                title="Xóa"
                                                                onclick="confirm('Bạn muốn xóa quyền ADMIN của User này chứ')">
                                                                <i class="fas fa-trash-alt">Xóa quyền ADMIN</i>
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
