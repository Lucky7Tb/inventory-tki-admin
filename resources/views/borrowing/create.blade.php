@extends('layouts.app')

@section('title', 'Peminjaman Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Peminjaman</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{route('borrowing.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="student_id">Nama peminjam</label>
            <select class="form-control" name="student_id" id="student_id">
                @foreach($dataStudent as $data)
                    <option value="{{$data->student_id}}">{{$data->student_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="item_id">Nama barang</label>
            <select class="form-control" name="item_id" id="item_id">
                @foreach($dataItem as $data)
                    <option value="{{$data->item_id}}">{{$data->item_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="item_ammount">Jumlah barang</label>
            <input type="text" name="item_ammount" id="item_ammount"  class="form-control @error('item_ammount') is-invalid @enderror">
            @error('item_ammount')
                <small id="item_ammount" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="borrowing_date_return">Tanggal pengembalian</label>
            <input type="date" name="borrowing_date_return" id="borrowing_date_return" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('borrowing')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
