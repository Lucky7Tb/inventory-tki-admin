<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
class StudentController extends Controller
{
    public function json(){
        $dataStudent = Student::select('student.*');
        return DataTables::eloquent($dataStudent)->addColumn('aksi',function($data){
            return "<a href='/student/edit/".$data->student_id."' class='badge badge-primary'>Edit</a>";
        })->rawColumns(['aksi'])->toJson();
    }

    public function index(Request $request){
        return view('student.index');
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'student_name' => 'required|string',
            'student_nis' => 'required|string|max:8',
            'student_class' => 'required|string|max:50',
        ]);
        $dataStudent = new Student;
        $dataStudent->student_name = $request->student_name;
        $dataStudent->student_nis = $request->student_nis;
        $dataStudent->student_class = $request->student_class;
        $dataStudent->save();
        return redirect()->route('student.create')->with('success', 'Data berhasil dimasukan');
    }

    public function edit(Student $student){
        return view('student.detail', compact('student'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'student_name' => 'required|string',
            'student_nis' => 'required|string|max:8',
            'student_class' => 'required|string|max:50',
        ]);
        $dataStudent = Student::find($request->student_id);
        $dataStudent->student_name = $request->student_name;
        $dataStudent->student_nis = $request->student_nis;
        $dataStudent->student_password = $request->student_password;
        $dataStudent->student_class = $request->student_class;
        $dataStudent->save();
        return redirect()->route('student')->with('success', 'Data berhasil diupdate');
    }

    public function delete(Request $request){
        $dataStudent = Student::find($request->student_id);
        $dataStudent->delete();
        return redirect()->route('student')->with('success', 'Data berhasil didelete');
    }

    public function importexcel(Request $request) 
	{
		$this->validate($request, [
			'file' => 'required|mimes:xls,xlsx'
		]);
 
        $file = $request->file('file');
 
		$nama_file = rand().$file->getClientOriginalName();
 
		$file->move('file_siswa',$nama_file);
 
        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        unlink(public_path('/file_siswa/'.$nama_file));

		return redirect()->route('student')->with('success', 'Data berhasil dimasukan');
    }
    
    public function exportexcel(Request $request){
        return (new SiswaExport($request->student_class))->download(\Carbon\Carbon::now().':Student.xls');
    }

}
