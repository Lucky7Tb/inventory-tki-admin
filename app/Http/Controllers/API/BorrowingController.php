<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Borrowing;
use App\Item;
class BorrowingController extends Controller
{
    public function borrowItem(Request $request){
        try {
            $dataBorrowing = new Borrowing;
            $dataBorrowing->student_id = $request->student_id;
            $dataBorrowing->item_id = $request->item_id;
            $dataBorrowing->item_ammount = (int)$request->item_ammount;
            $dataBorrowing->borrowing_status = "Belum Diambil";
            $dataBorrowing->status = "Not Confirm";
            $dataBorrowing->borrowing_date = \Carbon\Carbon::now();     
            $dataBorrowing->borrowing_date_return = \Carbon\Carbon::now();
            $dataBorrowing->save();
        
            $dataItem = Item::find($request->item_id);
            $dataItem->item_ammount = $dataItem->item_ammount - (int)$request->item_ammount;
            $dataItem->save();
             return response()->json([
                "message" => "Sukses",
                "serve" => []
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }
}
