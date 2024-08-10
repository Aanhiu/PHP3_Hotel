<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KindRoomsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomsHomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BookingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// hoặc sử dụng middleware tùy chỉnh
Route::group(['middleware' => 'checkAdmin'], function () {
    Route::get('/admin', function(){
        return view('layouts.admin.app');
    })->name('admin');

    Route::get('/admin', function(){
        return view('layouts.admin.dashboard');
    })->name('dashboard');

    // Các route khác cần kiểm tra đăng nhập cũng có thể đặt trong nhóm này
    
// xuat all list KindRooms
Route::get('/listKindRooms' , [KindRoomsController::class , 'getListKindRooms'])->name('listKindRooms');

// den form add KindRooms
Route::get('/addKindRooms' , [KindRoomsController::class  , 'addKindRooms'])->name('addKindRooms');

// quay lai list
Route::get('/black' , [KindRoomsController::class  , 'black'])->name('black');

// them moi kindrooms
Route::put('addKindRooms' , [KindRoomsController::class , 'storeKindRooms'])->name('storeKindRooms');

// xoa kindrooms theo id
Route::delete('/deleteKindRooms/{id}' , [KindRoomsController::class , 'deleteKindRooms'])->name('deleteKindRooms');

// den form edit kindrooms
Route::get('editKindRooms/{id}'  , [KindRoomsController::class , 'editKindRooms'])->name('editKindRooms');

// update cập nhật dữ liệu mới
Route::put('editKindRooms/{id}' , [KindRoomsController::class , 'updateKindRooms'])->name('updateKindRooms');


// Rooms
Route::get('listRooms' , [RoomsController::class , 'getListRooms'])->name('listRooms');

// black ve list Rooms
Route::get('/black' , [RoomsController::class  , 'black'])->name('black');

// đến form add Rooms
Route::get('/addRoom' , [RoomsController::class , 'addRoom_showKindRooms'])->name('addRoom');

// thêm mới dữ liệu
Route::put('/addRoom' , [RoomsController::class , 'storeRoom'])->name('storeRoom');

// xoa Room theo id
Route::delete('/delete/{id}' , [RoomsController::class , 'deleteRoom'])->name('deleteRoom');

// đến form sửa 
Route::get('/editRoom/{id}' , [RoomsController::class , 'editRoomID'])->name('editRoom');

// update Room
Route::put('/editRoom/{id}' , [RoomsController::class , 'updateRoom'])->name('updateRoom');


// User
Route::get('/users' , [UsersController::class , 'getallUsers'])->name('users');

// xóa User theo id
Route::delete('/user/{id}' , [UsersController::class , 'deleteUser'])->name('deleteUser');

// cấp quyền user cấp admin 
Route::put('/updateRole_admin/{id}' , [UsersController::class , 'updateRole_admin'])->name('updateRole_admin');

Route::put('/updateRole_user/{id}' , [UsersController::class , 'updateRole_user'])->name('updateRole_user');
});


// // xuat all list KindRooms
// Route::get('/listKindRooms' , [KindRoomsController::class , 'getListKindRooms'])->name('listKindRooms');

// // den form add KindRooms
// Route::get('/addKindRooms' , [KindRoomsController::class  , 'addKindRooms'])->name('addKindRooms');

// // quay lai list
// Route::get('/black' , [KindRoomsController::class  , 'black'])->name('black');

// // them moi kindrooms
// Route::put('addKindRooms' , [KindRoomsController::class , 'storeKindRooms'])->name('storeKindRooms');

// // xoa kindrooms theo id
// Route::delete('/deleteKindRooms/{id}' , [KindRoomsController::class , 'deleteKindRooms'])->name('deleteKindRooms');

// // den form edit kindrooms
// Route::get('editKindRooms/{id}'  , [KindRoomsController::class , 'editKindRooms'])->name('editKindRooms');

// // update cập nhật dữ liệu mới
// Route::put('editKindRooms/{id}' , [KindRoomsController::class , 'updateKindRooms'])->name('updateKindRooms');


// // Rooms
// Route::get('listRooms' , [RoomsController::class , 'getListRooms'])->name('listRooms');

// // black ve list Rooms
// Route::get('/black' , [RoomsController::class  , 'black'])->name('black');

// // đến form add Rooms
// Route::get('/addRoom' , [RoomsController::class , 'addRoom_showKindRooms'])->name('addRoom');

// // thêm mới dữ liệu
// Route::put('/addRoom' , [RoomsController::class , 'storeRoom'])->name('storeRoom');

// // xoa Room theo id
// Route::delete('/delete/{id}' , [RoomsController::class , 'deleteRoom'])->name('deleteRoom');

// // đến form sửa 
// Route::get('/editRoom/{id}' , [RoomsController::class , 'editRoomID'])->name('editRoom');

// // update Room
// Route::put('/editRoom/{id}' , [RoomsController::class , 'updateRoom'])->name('updateRoom');


// // User
// Route::get('/users' , [UsersController::class , 'getallUsers'])->name('users');

// // xóa User theo id
// Route::delete('/user/{id}' , [UsersController::class , 'deleteUser'])->name('deleteUser');

// // cấp quyền user cấp admin 
// Route::put('/updateRole_admin/{id}' , [UsersController::class , 'updateRole_admin'])->name('updateRole_admin');

// Route::put('/updateRole_user/{id}' , [UsersController::class , 'updateRole_user'])->name('updateRole_user');



// dang ky dang nhap
// dieu huong den trang dang ky dang nhap
Route::get('/dangky', function () {
    return view('Clients.dangky');
})->name('dangky');

Route::get('/dangnhap', function () {
    return view('Clients.dangnhap');
})->name('dangnhap');

Route::get('/taikhoan', function () {
    return view('Clients.taikhoan');
})->name('taikhoan');

// xu li dang ky vs dang nhap logout
Route::post('/dangky', [AuthController::class, 'dangkyUser'])->name('dangkyUser');
Route::post('/dangnhap', [AuthController::class, 'dangnhapUser'])->name('dangnhapUser');
Route::post('/dangxuat', [AuthController::class, 'dangxuatUser'])->name('dangxuatUser');
Route::get('/taikhoan', [RoomsHomeController::class , 'getUserID'])->name('taikhoan');

// xuat phong ra trang chủ
Route::get('/', [RoomsHomeController::class , 'allRoomHome'])->name('index');
Route::get('room' , [RoomsHomeController::class , 'allRoom'])->name('room');
Route::get('/room-detail/{id}' , [RoomsHomeController::class , 'room_detail'])->name('room-detail');


// User Booking 
Route::post('/bookRoom' , [BookingsController::class , 'booking'])->name('bookRoom')->middleware('auth');
Route::get('/detail-book' , [BookingsController::class , 'listBookUser'])->name('detail-book');
Route::put('/user_checkIN/{id}' , [BookingsController::class , 'user_CheckIN'])->name('user_CheckIN');
Route::put('/user_checkOUT/{id}' , [BookingsController::class , 'user_CheckOUT'])->name('user_CheckOUT');
Route::delete('/userdeleteBook/{id}' , [BookingsController::class , 'userDeleteBook'])->name('userDeleteBook');
Route::delete('/userHUYbook/{id}' , [BookingsController::class , 'userHUYbook'])->name('userHUYbook');



// admin quản lí booking
Route::get('/listBookAdmin' , [BookingsController::class , 'listBookAdmin'])->name('listBookAdmin');
Route::put('/xacnhanBook/{id}' , [BookingsController::class , 'xacnhanBook'])->name('xacnhanBook');
Route::put('/admin_xacnhan_checkIN/{id}' , [BookingsController::class , 'admin_xacnhan_checkIN'])->name('admin_xacnhan_checkIN');
Route::put('/admin_xacnhan_checkOUT/{id}' , [BookingsController::class , 'admin_xacnhan_checkOUT'])->name('admin_xacnhan_checkOUT');
Route::delete('/deleteBook/{id}' , [BookingsController::class , 'adminDeleteBook'])->name('adminDeleteBook');









