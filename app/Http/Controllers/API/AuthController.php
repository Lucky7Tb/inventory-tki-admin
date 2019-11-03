<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
class AuthController extends Controller
{
    public function login(Request $request){
        try {
            $dataStudent = Student::where('student_nis', $request->Nis)->where('student_password', $request->Password)->first();
             return response()->json([
                'message' => "Success", 
                'serve' => $dataStudent
            ], 200);
        
        } catch (Exception $e) {
            return response()->json([
                "message" => "Terjadi kesalahan pada server",
                "serve" => []
            ], 500);
        }
    }
}
