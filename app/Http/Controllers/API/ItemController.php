<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
class ItemController extends Controller
{
    public function index(Request $request){
        try {
            $dataItem = Item::where('item_conditions', 'Baik')->where('item_ammount', '>', 0)->get();
             return response()->json([
                'message' => "Success", 
                'serve' => $dataItem
            ], 200);
        
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }
}
