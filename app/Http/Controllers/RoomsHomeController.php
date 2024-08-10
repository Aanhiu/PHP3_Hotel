<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsHomeController extends Controller
{

    // xuat room all home
    public function allRoomHome(){
        $userID = Auth::id();
        $getallRoomHome = DB::table('Rooms')->where('Rooms.status' , 0)->join('KindRooms' , 'Rooms.KindRomm_id', '=' ,'KindRooms.id')->select('Rooms.*'  ,'KindRooms.name as KindRoom_name')->get();
        //dd($getallRoomHome);
        $getUserID = DB::table('Users')->where('id' , $userID)->select('name' , 'email' , 'phone' )->first();
        //dd($getUserID);
        return view('index' , compact('getallRoomHome' , 'getUserID'));
    }

    // dieu huong user den 
    public function allRoom(){
        $allRooms = DB::table('Rooms')->where('Rooms.status' , 0)->join('KindRooms' , 'Rooms.KindRomm_id' , '=' , 'KindRooms.id')->select('Rooms.*' , 'KindRooms.name as KindRoom_name')->get();
        //dd($allRooms);
        return view('Clients.rooms' , compact('allRooms'));
    }
    public function room_detail($id){
        // roome detail theo id
        $roomDetailID = DB::table('Rooms')->join('KindRooms' , 'Rooms.KindRomm_id' , '=', 'KindRooms.id')->select('Rooms.*' , 'KindRooms.name as KindRoom_name')->where('Rooms.id' , $id)->first();
        //dd($roomDetailID);
        return view('Clients.room-detail' , compact('roomDetailID'));
    }

    public function getUserID(){
        $userID = Auth::id();
        $getUserID = DB::table('Users')->where('id' , $userID)->select('name' , 'email' , 'phone' , 'role' )->first();
        //dd($getUserID);
        return view('Clients.taikhoan' , compact('getUserID'));
    }

   


}
