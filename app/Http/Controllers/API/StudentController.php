<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    public function savePlayerId(Request $request)
    {
        try {
            $dataStudent = Student::find($request->student_id);
            $dataStudent->player_id = $request->player_id;
            $dataStudent->save();
            return response()->json([
                "message" => "Sukses",
                "serve" => [],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }
}
