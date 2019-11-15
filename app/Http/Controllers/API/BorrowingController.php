<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Notification;
use App\Borrowing;
use App\Item;
class BorrowingController extends Controller
{
    public function borrowItem(Request $request){
        try {
            $dataItem = Item::find($request->item_id);
            if($dataItem->item_ammount < $request->item_ammount){
                return response()->json([
                    "message" => "Maaf barang yang ingin dipinjam kurang",
                    "serve" => $dataItem
                ], 400);
            }else{
                $dataBorrowing = new Borrowing;
                $dataBorrowing->student_id = $request->student_id;
                $dataBorrowing->item_id = $request->item_id;
                $dataBorrowing->item_ammount = (int)$request->item_ammount;
                $dataBorrowing->borrowing_status = "Belum Diambil";
                $dataBorrowing->status = "Not Confirm";
                $dataBorrowing->borrowing_date = \Carbon\Carbon::now();     
                $dataBorrowing->borrowing_date_return = \Carbon\Carbon::now();
                $dataBorrowing->save();
                event(new Notification("Ada yang meminjam"));
                return response()->json([
                    "message" => "Sukses",
                    "serve" => $dataBorrowing
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }

    public function getUser(){
        try {
            $dataBorrowing = Borrowing::where('status', 'Not Confirm')->orderBy('created_at', 'ASC')->get();
            return response()->json([
                "message" => "Sukses",
                "serve" => $dataBorrowing
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }

    public function getStudentData(Request $request){
        try {
            $dataBorrowing = Borrowing::where('student_id', $request->student_id)->get();
            $data['borrowing'] = $dataBorrowing->where('status', 'Confirm')->count();
            $data['notreturn'] = $dataBorrowing->where('status', 'Confirm')->where('borrowing_status', 'Dipinjam')->count();
            $data['return'] = $dataBorrowing->where('status', 'Confirm')->where('borrowing_status', 'Dikembalikan')->count();
            $data['nottaken'] = $dataBorrowing->where('status', 'Confirm')->where('borrowing_status', 'Belum Diambil')->count();
            return response()->json([
                "message" => "Sukses",
                "serve" => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    } 

    public function getBorrowData(Request $request){
        try {
            $dataBorrowing = Borrowing::where('student_id', $request->student_id)->where('status', 'Confirm')->whereIn('borrowing_status', ['Belum Diambil', 'Dipinjam'])->get();
            return response()->json([
                "message" => "Sukses",
                "serve" => $dataBorrowing
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }
}
