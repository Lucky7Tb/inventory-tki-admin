@extends('layouts.app')

@section('title', 'Peminjam Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update peminjam</h3>
    <div class="float-right">
        <form action="{{route('borrowing.delete')}}" method="post">
            @csrf
            @method('delete')
            @if($borrowing->borrowing_status == "Dipinjam")
                <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary" disabled><i class="mdi mdi-delete-outline"></i></button>
            @else
                <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-delete-outline"></i></button>
                <input type="hidden" name="borrowing_id" value="{{$borrowing->borrowing_id}}">    
            @endif
        </form>
    </div>
    <form action="{{route('borrowing.update')}}" method="post">
        @csrf
        @method('put')
        <div class="form-group mt-5">
            <input type="hidden" name="borrowing_id" value="{{$borrowing->borrowing_id}}">
            <label for="student_id">Nama peminjam</label>
            <input class="form-control" disabled type="text" name="student_id" id="student_id" value="{{$borrowing->student_id['student_name']}}">
        </div>
        <div class="form-group">
            <label for="item_id">Nama barang</label>
            <input class="form-control" disabled type="text" name="item_id" id="item_id" value="{{$borrowing->item_id['item_name']}}">
        </div>
        <div class="form-group">
            <label for="borrowing_status">Status peminjaman</label>
                @if($borrowing->status == "Not Confirm")
                    <input type="text" class="form-control" name="borrowing_status" value="Harap konfirmasi terlebih dahulu" disabled>
                    <input type="hidden" class="form-control" name="borrowing_status" value="Harap konfirmasi terlebih dahulu">
                @else
                    @if($borrowing->borrowing_status == "Belum Diambil")
                        <select class="form-control" name="borrowing_status" id="borrowing_status">
                            <option value="Dipinjam">Dipinjam</option>
                            <option selected value="Belum Diambil">Belum Diambil</option>
                        </select>
                    @else
                        <input type="text" class="form-control" value="{{$borrowing->borrowing_status}}" disabled>
                        <input type="hidden" name="borrowing_status" value="{{$borrowing->borrowing_status}}" >
                    @endif
                @endif
        </div>
        <div class="form-group">
            <label for="status">Status konfirmasi</label>
                @if($borrowing->status == "Confirm")
                    <input type="text" class="form-control" value="{{$borrowing->status}}" disabled>
                    <input type="hidden" name="status" value="{{$borrowing->status}}">
                @else
                    <select class="form-control" name="status" id="status"> 
                        <option value="Confirm">Konfirmasi</option>
                        <option selected value="Not Confirm">Belum terkonfirmasi</option>
                    </select>
                @endif
        </div>
        @if($borrowing->status == "Confirm" && $borrowing->borrowing_status == "Dikembalikan")
            <button disabled type="submit" class="btn btn-primary btn-flat">Save</button>
        @else
            <button type="submit" class="btn btn-primary btn-flat">Save</button>
        @endif
        <a href="{{route('borrowing')}}" class="btn btn-outline-dark btn-flat">Kembali</a>
    </form>
</div>
@endsection
