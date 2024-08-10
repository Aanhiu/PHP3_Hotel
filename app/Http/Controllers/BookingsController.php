<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingsController extends Controller
{

    // User bookings

    // hàm dang ky thong tin dat phong
     // get user ra home 
     public function getuserID(){
        $userID = Auth::id();
        $getUserID = DB::table('Users')->where('id' , $userID)->select('fullname' , 'email' , 'phone' )->first();
        dd($getUserID);
        return view('index' , compact('getUserID'));
     }
 
    public function booking(Request $request)
    {

        // check khi ấn booking ko login yêu cầu login đưa đến trang login
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Vui lòng đăng nhập để đặt phòng !!!');
        }

        // lấy id user đăng nhập
        $userID = Auth::id();

        // lấy thông tin ngày đến và ngày đi
        $check_in = Carbon::parse($request->input('check_in'));
        $check_out = Carbon::parse($request->input('check_out'));
        // tính số ngày ở lại
        $day = $check_in->diffInDays($check_out);

        // lấy giá room ở csdl
        $roomPrice = DB::table('Rooms')->where('id', $request->input('Room_id'))->value('price');
        // tính tổng tiền lưu vào csdl bảng Bookings
        $total_price = $roomPrice * $day;

        // lưu thông tin vào db Bookings
        DB::table('Bookings')->insert([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'number_person' => $request->input('number_person'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'pay' => $request->input('pay'),
            'User_id' => $userID,
            'Room_id' => $request->input('Room_id'),
            'total_price' => $total_price // Lưu tổng tiền vào cơ sở dữ liệu
        ]);
        return redirect()->route('detail-book')->with('success', 'Đặt phòng thành công!');
    }

    // in bill tính tien theo ngay den ngay di book
    // admin quan lí booking
    // show list book Book_id bill và tổng tiền theo ngày

    public function listBookAdmin()
    {
        $listBookAd = DB::table('Bookings')->join('Rooms', 'Bookings.Room_id', '=', 'Rooms.id')->select('Bookings.*', 'Rooms.name', 'Rooms.image')->get();
        //dd($listBookAd);
        return view('Bookings.list', compact('listBookAd'));
    }


    public function listBookUser()
    {
        $userID = Auth::id();
        $listBookUser = DB::table('Bookings')->where('User_id', $userID)->join('Rooms', 'Bookings.Room_id', '=', 'Rooms.id')->select('Bookings.*', 'Rooms.name as Room_name', 'Rooms.image as Room_image')->get();
        //dd($listBookUser);
        return view('Clients.detail-book', compact('listBookUser'));
    }

    // admin cập nhật xác nhận book cho User
    public function xacnhanBook($id)
    {
        DB::table('Bookings')->where('id', $id)->update([
            'status' => 1,
        ]);

        // cập nhật phong thành 1 để mất ở index home
        // Lấy Room_id từ Booking
        $booking = DB::table('Bookings')->where('id', $id)->first();
        $roomId = $booking->Room_id;

        // Cập nhật trạng thái của Room
        DB::table('Rooms')->where('id', $roomId)->update([
            'status' => 1,
        ]);

        return redirect()->route('listBookAdmin');
    }

    // user check in check out
    public function user_CheckIN($id)
    {
        DB::table('Bookings')->where('id', $id)->update([
            'status' => 11,
        ]);
        return redirect()->route('detail-book');
    }
    // user check out
    public function user_CheckOUT($id)
    {
        DB::table('Bookings')->where('id', $id)->update([
            'status' => 22,
        ]);
        return redirect()->route('detail-book');
    }



    // admin xác nhận check in 
    public function admin_xacnhan_checkIN($id)
    {
        DB::table('Bookings')->where('id', $id)->update([
            'status' => 33,
        ]);

        return redirect()->route('listBookAdmin');
    }

    // admin xác nhận check in check out
    public function admin_xacnhan_checkOUT($id)
    {
        DB::table('Bookings')->where('id', $id)->update([
            'status' => 44,
        ]);
        // cập nhật phong thành 0 để hien lai home
        // Lấy Room_id từ Booking
        $booking = DB::table('Bookings')->where('id', $id)->first();
        $roomId = $booking->Room_id;

        // Cập nhật trạng thái của Room
        DB::table('Rooms')->where('id', $roomId)->update([
            'status' => 0,
        ]);

        return redirect()->route('listBookAdmin');
    }

    // delete booking room theo id
    public function userDeleteBook($id)
    {

        DB::table('Bookings')->where('id', $id)->delete();
        return redirect()->route('detail-book');

    }

    public function adminDeleteBook($id)
    {
        DB::table('Bookings')->where('id', $id)->delete();
        return redirect()->route('listBookAdmin');

    }

    // user hủy bookings khi admin chưa xac nhan
    public function userHUYbook($id)
    {

        DB::table('Bookings')->where('id', $id)->delete();
        return redirect()->route('detail-book');

    }












}
