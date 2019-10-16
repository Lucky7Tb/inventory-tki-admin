<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Room;
use App\ItemCategory;
use DataTables;
class ItemController extends Controller
{
    public function json(){
        $dataItem = Item::select('item.*');
        return DataTables::eloquent($dataItem)->addColumn('aksi',function($data){
            return "<a href='/item/edit/".$data->item_id."' class='badge badge-primary'>Edit</a>";
        })->rawColumns(['aksi'])->toJson();
    }

    public function index(Request $request){
        return view('item.index');
    }

    public function create(){
        $dataItemCategory = ItemCategory::select('item_category_id', 'item_category_name')->get();
        $dataRoom = Room::select('room_id', 'room_name')->get();
        return view('item.create', compact('dataItemCategory', 'dataRoom'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:50',
            'item_ammount' => 'required|numeric|max:100',
        ]);
        $dataItem = new Item;
        $dataItem->item_name = $request->item_name;
        $dataItem->item_conditions = $request->item_conditions;
        $dataItem->item_ammount = $request->item_ammount;
        $dataItem->room_id = $request->room_id;        
        $dataItem->item_category_id = $request->item_category_id;        
        $dataItem->save();
        return redirect()->route('item.create')->with('success', 'Data berhasil dimasukan');
    }

    public function edit(Item $item){
        $dataItemCategory = ItemCategory::select('item_category_id', 'item_category_name')->get();
        $dataRoom = Room::select('room_id', 'room_name')->get();
        return view('item.detail', compact('item', 'dataItemCategory', 'dataRoom'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:50',
            'item_ammount' => 'required|numeric|max:100',
        ]);
        $dataItem = Item::find($request->item_id);
        $dataItem->item_name = $request->item_name;
        $dataItem->item_conditions = $request->item_conditions;
        $dataItem->item_ammount = $request->item_ammount;
        $dataItem->room_id = $request->room_id;        
        $dataItem->item_category_id = $request->item_category_id;   
        $dataItem->save();
        return redirect()->route('item')->with('success', 'Data berhasil diupdate');
    }

    public function delete(Request $request){
        $dataItem = Item::find($request->item_id);
        $dataItem->delete();
        return redirect()->route('item')->with('success', 'Data berhasil didelete');
    }
}
