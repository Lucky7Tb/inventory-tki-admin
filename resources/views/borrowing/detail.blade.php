@extends('layouts.app')

@section('title', 'Peminjam Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update peminjam</h3>
    <div class="float-right">
        <form action="{{route('borrowing.delete')}}" method="post">
            @csrf
            @method('delete')
            <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-delete-outline"></i></button>
            <input type="hidden" name="borrowing_id" value="{{$borrowing->borrowing_id}}">
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
            <select class="form-control" name="borrowing_status" id="borrowing_status">
                @if($borrowing->borrowing_status == "Dipinjam")
                    <option selected value="Dipinjam">Dipinjam</option>
                    <option value="Belum Diambil">Belum Diambil</option>
                @elseif($borrowing->borrowing_status == "Belum Diambil")
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Belum Diambil">Belum Diambil</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status konfirmasi</label>
            <select class="form-control" name="status" id="status">
                @if($borrowing->status == "Confirm")
                    <option selected value="Confirm">Konfirmasi</option>
                    <option value="Not Confirm">Belum terkonfirmasi</option>
                @else
                    <option value="Confirm">Konfirmasi</option>
                    <option selected value="Not Confirm">Belum terkonfirmasi</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('borrowing')}}" class="btn btn-outline-dark btn-flat">Kembali</a>
    </form>
</div>
@endsection
