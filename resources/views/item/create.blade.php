@extends('layouts.app')

@section('title', 'Item Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Add kategori barang</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{route('item.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="item_name">Nama barang</label>
            <input type="text" name="item_name" id="item_name" class="form-control @error('item_name') is-invalid @enderror">
            @error('item_name')
                <small id="item_name" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_name">Kondisi barang</label>
            <select class="form-control" name="item_conditions" id="item_conditions">
                <option value="Baik">Baik</option>
                <option value="Tidak Baik">Tidak Baik</option>
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
            <label for="item_category_id">Jenis barang</label>
            <select class="form-control" name="item_category_id" id="item_category_id">
                @foreach($dataItemCategory as $dataItem)
                    <option value="{{$dataItem->item_category_id}}">{{$dataItem->item_category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room_id">Ruangan</label>
            <select class="form-control" name="room_id" id="room_id">
                @foreach($dataRoom as $room)
                    <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('item')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
