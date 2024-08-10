<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    // code Rooms

    // xuat list all Rooms
    public function getListRooms(){
        $getListRooms = DB::table('Rooms')->join('KindRooms' , 'Rooms.KindRomm_id', '=' ,'KindRooms.id')->select('Rooms.*'  ,'KindRooms.name as KindRoom_name')->get();
        //dd($getListRooms);
        return view('Rooms.list' , compact('getListRooms'));
    }

    // ham black list Rooms
    public function black(){
        return redirect()->route('listRooms');
    }

    // thêm mới Rooms và đổ tên KindRooms để thêm mới Rooms
    public function addRoom_showKindRooms(){
        $KindRoomName = DB::table('KindRooms')->select('KindRooms.*' , 'KindRooms.name as KindRoom_name')->get();
        //dd($KindRoomName);
        return view('Rooms.add' , compact('KindRoomName'));
    }
    
    // store thêm mới dữ liệu 
    public function storeRoom(Request $request){
        // vilidate 
        $request->validate([
            'name'=> 'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'price'=>'required|numeric', 
            'description'=>'required|string',
            'KindRomm_id'=>'required|integer',
        ]);

        // xử lí việc upload
        $imagePath = null;
        if($request->hasFile('image')){
            //php artisan storage:link  // tạo ổ lưu trữ image : public/storage/images
            $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');
        }

        // insert thêm mới dữ liệu vào
        // lấy dữ liệu các biết từ form add thêm mới product
        DB::table('Rooms')->insert([
            // lấy các name ở form 
            'name'=>$request->name,
            'image'=>$imagePath ,
            'price'=>$request->price,
            'description'=>$request->description,
            'KindRomm_id'=>$request->KindRomm_id,
        ]);      

        // the xong chuye huong ve list
        return redirect('listRooms');
    }

    // xoa theo id Room
    public function deleteRoom($id){
        DB::table('Rooms')->where('id' , $id)->delete();
        return redirect('listRooms');
    }

    // đến form sửa đổ dữ liệu Rooms theo id
    public function editRoomID($id){
        $KindRoomName = DB::table('KindRooms')->select('id', 'name as Kr_name')->get();
        $getRoomID = DB::table('Rooms')
            ->join('KindRooms', 'Rooms.KindRomm_id', '=', 'KindRooms.id')
            ->select('Rooms.*', 'KindRooms.name as KindRoom_name')
            ->where('Rooms.id', $id)
            ->first();
       
        return view('Rooms.edit', compact('KindRoomName', 'getRoomID'));
    }
    

    public function updateRoom(Request $request, $id){
        // Validate 
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'KindRomm_id' => 'required|integer',
        ]);
    
        // Xử lý việc upload ảnh
        $imagePath = DB::table('Rooms')->where('id', $id)->value('image'); // Lấy ảnh hiện tại
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');
        }
    
        // Cập nhật dữ liệu vào cơ sở dữ liệu
        DB::table('Rooms')->where('id', $id)->update([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
            'KindRomm_id' => $request->KindRomm_id,
        ]);
    
        // Hoàn thành và chuyển hướng về danh sách
        return redirect('listRooms');
    }
    
    
}
