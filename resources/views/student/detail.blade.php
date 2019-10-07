@extends('layouts.app')

@section('title', 'Student Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update siswa</h3>
    <div class="float-right">
        <form action="{{route('student.delete')}}" method="post">
            @csrf
            @method('delete')
            <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi md-delete-outline"></i></button>
            <input type="hidden" name="student_id" value="{{$student->student_id}}">
        </form>
    </div>
    <form action="{{route('student.update')}}" method="post" class="mt-5">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="hidden" name="student_id" value="{{$student->student_id}}">
            <label for="student_name">Nama siswa</label>
            <input type="text" name="student_name" id="student_name" class="form-control @error('student_name') is-invalid @enderror" value="{{$student->student_name}}">
            @error('student_name')
                <small id="student_name_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="student_nis">Nis siswa</label>
            <input type="text" name="student_nis" id="student_nis" class="form-control @error('student_nis') is-invalid @enderror" value="{{$student->student_nis}}">
            @error('student_nis')
                <small id="student_nis_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="student_password">Password siswa</label>
            <input type="text" name="student_password" id="student_password" class="form-control @error('student_password') is-invalid @enderror" value="{{$student->student_password}}">
            @error('student_password')
                <small id="student_password_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <div class="showcase_text_area">
                <label>Kelas siswa</label>
            </div>
            <select name="student_class" id="kelas" class="custom-select">
                <option value="10-Elektro-1">10-Elektro-1</option>
                <option value="10-Elektro-2">10-Elektro-2</option>
                <option value="10-Elektro-3">10-Elektro-3</option>
                <option value="10-Elektro-4">10-Elektro-4</option>
                <option value="10-Mesin-1">10-Mesin-1</option>
                <option value="10-Mesin-2">10-Mesin-2</option>
                <option value="10-TGM-1">10-TGM-1</option>
                <option value="10-TKR-1">10-TKR-1</option>
                <option value="10-TKR-2">10-TKR-2</option>
                <option value="10-Tekstil-1">10-Tektil-1</option>
                <option value="10-Tekstil-2">10-Tekstil-2</option>
                <option value="10-Tki-1">10-Tki-1</option>
                <option value="10-Tki-2">10-Tki-2</option>
                <option value="10-Tki-3">10-Tki-3</option>
                <option value="10-Tki-4">10-Tki-4</option>
                <option value="10-Tki-5">10-Tki-5</option>
                <option value="10-Tki-6">10-Tki-6</option>
                <option value="11-Elektro-1">11-Elektro-1</option>
                <option value="11-Elektro-2">11-Elektro-2</option>
                <option value="11-Elektro-3">11-Elektro-3</option>
                <option value="11-Mekatronika">11-Mekatronika</option>
                <option value="11-Mesin-1">11-Mesin-1</option>
                <option value="11-Mesin-2">11-Mesin-2</option>
                <option value="11-TGM-1">11-TGM-1</option>
                <option value="11-TKR-1">11-TKR-1</option>
                <option value="11-TKR-2">11-TKR-2</option>
                <option value="11-Tekstil-1">11-Tektil-1</option>
                <option value="11-Tekstil-2">11-Tekstil-2</option>
                <option value="11-TKJ-1">11-Tkj-1</option>
                <option value="11-TKJ-2">11-Tkj-2</option>
                <option value="11-MM-1">11-MM-1</option>
                <option value="11-MM-2">11-MMi-2</option>
                <option value="11-RPL-1">11-Rpl-1</option>
                <option value="11-RPL-2">11-Rpl-2</option>
                <option value="12-Elektro-1">12-Elektro-1</option>
                <option value="12-Elektro-2">12-Elektro-2</option>
                <option value="12-Elektro-3">12-Elektro-3</option>
                <option value="12-Mekatronika">12-Mekatronika</option>
                <option value="12-Mesin-1">12-Mesin-1</option>
                <option value="12-Mesin-2">12-Mesin-2</option>
                <option value="12-TGM-1">12-TGM-1</option>
                <option value="12-TKR-1">12-TKR-1</option>
                <option value="12-TKR-2">12-TKR-2</option>
                <option value="12-Tekstil-1">12-Tektil-1</option>
                <option value="12-Tekstil-2">12-Tekstil-2</option>
                <option value="12-TKJ-1">12-Tkj-1</option>
                <option value="12-TKJ-2">12-Tkj-2</option>
                <option value="12-MM-1">12-MM-1</option>
                <option value="12-MM-2">12-MMi-2</option>
                <option value="12-RPL-1">12-Rpl-1</option>
                <option value="12-RPL-2">12-Rpl-2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('student')}}" class="btn btn-danger btn-flat">Cancel</a>
    </form>
</div>
@endsection
