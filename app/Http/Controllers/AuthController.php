<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // viet dang ky dang nhap 
    public function dangkyUser(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'phone' => 'required|string|max:15',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        DB::table('Users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dangnhap')->with('success', 'Đăng ký thành công. Hãy đăng nhập.');
    }

    // hàm login với name password
    public function dangnhapUser(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $check_user = $request->only('email', 'password');

        if (Auth::attempt($check_user)) {
            return redirect()->route('index')->with('success', 'Đăng nhập thành công.');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    // hàm đăng xuất 
    public function dangxuatUser(){
        Auth::logout();
        return redirect()->route('index')->with('success', 'Đăng xuất thành công.');
    }

    // hàm xử lí bảo mật admin

    

    

}
