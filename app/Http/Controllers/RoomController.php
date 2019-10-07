<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use DataTables;
class RoomController extends Controller
{
    public function json(){
        $dataRoom = Room::select('room.*');
        return DataTables::eloquent($dataRoom)->addColumn('aksi',function($data){
            return "<a href='/room/edit/".$data->room_id."' class='badge badge-primary'>Edit</a>";
        })->rawColumns(['aksi'])->toJson();
    }

    public function index(Request $request){
        return view('room.index');
    }

    public function create(){
        return view('room.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:50',
            'room_description' => 'required|string|max:100',
        ]);
        $dataRoom = new Room;
        $dataRoom->room_name = $request->room_name;
        $dataRoom->room_description = $request->room_description;
        $dataRoom->save();
        return redirect()->route('room.create')->with('success', 'Data berhasil dimasukan');
    }

    public function edit(Room $room){
        return view('room.detail', compact('room'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:50',
            'room_description' => 'required|string|max:100',
        ]);
        $dataRoom = Room::find($request->room_id);
        $dataRoom->room_name = $request->room_name;
        $dataRoom->room_description = $request->room_description;
        $dataRoom->save();
        return redirect()->route('room')->with('success', 'Data berhasil diupdate');
    }

    public function delete(Request $request){
        $dataRoom = Room::find($request->room_id);
        $dataRoom->delete();
        return redirect()->route('room')->with('success', 'Data berhasil didelete');
    }
}
