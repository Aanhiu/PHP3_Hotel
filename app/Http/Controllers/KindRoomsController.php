<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KindRoomsController extends Controller
{
    // code KindRoom
    // code xuat all list KindRooms
    public function getListKindRooms(){
        $getKindRooms = DB::table('KindRooms')->select('id' , 'name' , 'description')->get();
        //dd($getKindRooms);
        return view('KindRooms.list' , compact('getKindRooms'));
    }

    // ham den trang them moi 
    public function addKindRooms(){
        return view('KindRooms.add');
    }

    // ham quay lai list
    public function black(){
        return redirect()->route('listKindRooms');
    }
    // ham them moi kindrooms
    public function storeKindRooms(Request $request){
        // code them moi
        $name = $request->name;
        $description = $request->description;
        
        // them du lieu moi vao csdl
        DB::table('KindRooms')->insert([
            'name'=>$name,
            'description'=>$description
        ]);

        return redirect()->route('listKindRooms');
    }

    // xoa theo id kindrooms o list
    public function deleteKindRooms($id){
        // xoa theo id
        DB::table('KindRooms')->where('id' , $id)->delete();
        return redirect()->route('listKindRooms');
    }

    // đổ dữ liệu kindrooms theo id
    public function editKindRooms($id){
        $KindRoomsID = DB::table('KindRooms')->where('id' , $id)->first();
        return view('KindRooms.edit' , compact('KindRoomsID'));
    }

    // cập nhật dữ liệu mới
    public function updateKindRooms(Request $request){
        $name = $request->name;
        $description = $request->description;
        // cập nhật dữ liệu mới
        DB::table('KindRooms')->where('id' , $request['id'])->update([
            'name'=>$name,
            'description'=>$description
        ]);

        return redirect()->route('listKindRooms');

    }


}
