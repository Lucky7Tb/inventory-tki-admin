<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Borrowing;
use App\Room;;
use App\Student;
class HomeController extends Controller
{

    public function index()
    {
        $dataItemGoodCondition = Item::where('item_conditions', 'Baik')->count();
        $dataItemBadCondition = Item::where('item_conditions', 'Tidak Baik')->count();
        $dataBorrowing = Borrowing::count();
        $dataStudent = Student::count();
        for($i = 1; $i <=12; $i++){
            $dataStatistikBorrowing["Bulan $i"] = Borrowing::whereYear('created_at', \Carbon\Carbon::now())->whereMonth('created_at', $i)->count();
        }
        return view('home', compact('dataItemGoodCondition', 'dataItemBadCondition', 'dataBorrowing', 'dataStudent', 'dataStatistikBorrowing'));
    }
}
