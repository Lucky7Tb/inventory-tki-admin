@extends('layouts.app')

@section('title', 'Peminjam Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update Peminjam</h3>
    <form action="{{route('returning.update')}}" method="post" class="mt-5">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="hidden" name="borrowing_id" value="{{$borrowing->borrowing_id}}">
            <label for="item_name">Nama peminjam</label>
            <input disabled type="text" name="item_name" id="item_name" class="form-control" value="{{$borrowing->student_id['student_name']}}">
        </div>
        <div class="form-group">
            <input type="hidden" name="item_id" value="{{$borrowing->item_id['item_name']}}">
            <label for="item_name">Nama barang</label>
            <input disabled type="text" name="item_name" id="item_name" class="form-control" value="{{$borrowing->item_id['item_name']}}">
        </div>
        <div class="form-group">
            <label for="item_name">Status</label>
            <select class="form-control" name="borrowing_status" id="borrowing_status">
                <option selected value="Dipinjam">Dipinjam</option>
                <option value="Dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('returning')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
