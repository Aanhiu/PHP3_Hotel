<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // admin quản lí người dùng
    // get all user ra list
    public function getallUsers(){
        $getallUser = DB::table('Users')->select('id','name' , 'email' , 'phone' , 'role')->get();
        //dd($getallUser);
        return view('Users.list' , compact('getallUser'));
    }

    // hàm xóa user
    public function deleteUser($id){
        DB::table('Users')->where('id' , $id)->delete();
        return redirect()->route('users');
    }

    // hàm cấp quyền cho user
    public function updateRole_admin($id){
        // code cập nhật role cấp quyền
        DB::table('Users')->where('id' ,$id)->update([
        'role'=> 1,
        ]);
        return redirect()->route('users');
    }
    public function updateRole_user($id){
        // code cập nhật role cấp quyền
        DB::table('Users')->where('id' ,$id)->update([
        'role'=> 0,
        ]);
        return redirect()->route('users');
    }

    // hàm cập lại quyền user cho admin đã cấp
    



}
