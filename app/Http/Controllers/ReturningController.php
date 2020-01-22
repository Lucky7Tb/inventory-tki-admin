<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrowing;
use App\Item;
use App\Student;
use DataTables;
use OneSignal;

class ReturningController extends Controller
{
    public function json(){
        $dataBorrowing = Borrowing::select('borrowing_id', 'student_id', 'item_id', 'borrowing_status', 'borrowing_date_return')->where('borrowing_status', 'Dipinjam')->where('status', 'Confirm');
        return DataTables::eloquent($dataBorrowing)->addColumn('aksi',function($data){
            return "<a href='/returning/edit/".$data->borrowing_id."' class='badge badge-primary'>Edit</a><a href='/returning/warning/".$data->borrowing_id."' class='badge badge-danger'>Peringati</a>";
        })->rawColumns(['aksi'])->toJson();
    }

    public function index(){
        return view('returning.index');
    }

    public function edit(Borrowing $borrowing){
        return view('returning.detail', compact('borrowing'));
    }

    public function update(Request $request){
        $dataBorrowing = Borrowing::find($request->borrowing_id);
        $dataItem = Item::find($dataBorrowing->item_id['item_id']);
        $dataItem->item_ammount = $dataItem->item_ammount + $dataBorrowing->item_ammount;
        $dataBorrowing->borrowing_status = $request->borrowing_status;
        $dataItem->save();
        $dataBorrowing->save();
        return redirect()->route('returning')->with('success', 'Data berhasil diupdate');
    }


    public function warning(Request $request){
        $dataBorrowing = Borrowing::find($request->borrowing);
        $dataStudent = Student::find($dataBorrowing->student_id['student_id']);
        $userId = $dataStudent['player_id'];
        OneSignal::sendNotificationToUser(
            "Harap segera mengembalikan barang : " . $dataBorrowing->item_id['item_name' ]. " jika tidak ingin terkena denda!",
            $userId,
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
        return redirect()->route('returning');
    }

}
