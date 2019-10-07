<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemCategory;
use DataTables;
class ItemCategoryController extends Controller
{
    public function json(){
        $dataItemCategory = ItemCategory::select('item_category.*');
        return DataTables::eloquent($dataItemCategory)->addColumn('aksi',function($data){
            return "<a href='/item_category/edit/".$data->item_category_id."' class='badge badge-primary'>Edit</a>";
        })->rawColumns(['aksi'])->toJson();
    }

    public function index(Request $request){
        return view('item_category.index');
    }

    public function create(){
        return view('item_category.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'item_category_name' => 'required|string|max:50',
            'item_category_description' => 'required|string|max:100',
        ]);
        $dataItemCategory = new ItemCategory;
        $dataItemCategory->item_category_name = $request->item_category_name;
        $dataItemCategory->item_category_description = $request->item_category_description;
        $dataItemCategory->save();
        return redirect()->route('item_category.create')->with('success', 'Data berhasil dimasukan');
    }

    public function edit(ItemCategory $item_category){
        return view('item_category.detail', compact('item_category'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'item_category_name' => 'required|string|max:50',
            'item_category_description' => 'required|string|max:100',
        ]);
        $dataItemCategory = ItemCategory::find($request->item_category_id);
        $dataItemCategory->item_category_name = $request->item_category_name;
        $dataItemCategory->item_category_description = $request->item_category_description;
        $dataItemCategory->save();
        return redirect()->route('item_category')->with('success', 'Data berhasil diupdate');
    }

    public function delete(Request $request){
        $dataItemCategory = ItemCategory::find($request->item_category_id);
        $dataItemCategory->delete();
        return redirect()->route('item_category')->with('success', 'Data berhasil didelete');
    }
}
