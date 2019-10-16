@extends('layouts.app')

@section('title', 'Item Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update barang</h3>
    <div class="float-right">
        <form action="{{route('item.delete')}}" method="post">
            @csrf
            @method('delete')
            <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-delete-outline"></i></button>
            <input type="hidden" name="item_id" value="{{$item->item_id}}">
        </form>
    </div>
    <form action="{{route('item.update')}}" method="post" class="mt-5">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="hidden" name="item_id" value="{{$item->item_id}}">
            <label for="item_name">Nama barang</label>
            <input type="text" name="item_name" id="item_name" class="form-control @error('item_name') is-invalid @enderror" value="{{$item->item_name}}">
            @error('item_name')
                <small id="item_name_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_name">Kondisi barang</label>
            <select class="form-control" name="item_conditions" id="item_conditions">
                <option value="Baik">Baik</option>
                <option value="Tidak Baik">Tidak baik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="item_ammount">Jumlah barang</label>
            <input type="text" name="item_ammount" id="item_ammount"  class="form-control @error('item_ammount') is-invalid @enderror" value="{{$item->item_ammount}}">
            @error('item_ammount')
                <small id="item_ammount" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_category_id">Jenis barang</label>
            <select class="form-control" name="item_category_id" id="item_category_id">
                @foreach($dataItemCategory as $dataItem)
                    <option
                        @if($dataItem->item_category_id == $item->item_category_id)
                            selected = "selected"
                        @endif
                        value="{{$dataItem->item_category_id}}">
                    
                        {{$dataItem->item_category_name}}
                    
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room_id">Ruangan</label>
            <select class="form-control" name="room_id" id="room_id">
                @foreach($dataRoom as $room)
                        <option  
                            @if($room->room_id == $item->room_id)
                                selected = "selected"
                            @endif
                            value="{{$room->room_id}}">
                            {{$room->room_name}}
                        </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('item')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
