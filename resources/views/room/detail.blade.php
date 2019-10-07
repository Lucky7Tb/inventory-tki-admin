@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update ruangan</h3>
    <div class="float-right">
        <form action="{{route('room.delete')}}" method="post">
            @csrf
            @method('delete')
            <button onclick="return confirm('Yakin ingin mengahapusnya?')" type="submit" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-delete-outline"></i></button>
            <input type="hidden" name="room_id" value="{{$room->room_id}}">
        </form>
    </div>
    <form action="{{route('room.update')}}" method="post" class="mt-5">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="hidden" name="room_id" value="{{$room->room_id}}">
            <label for="room_name">Nama ruangan</label>
            <input type="text" name="room_name" id="room_name" class="form-control @error('room_name') is-invalid @enderror" value="{{$room->room_name}}">
            @error('room_name')
                <small id="room_name_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="room_description">Keterangan ruangan</label>
            <textarea class="@error('room_description') is-invalid @enderror form-control" name="room_description" id="room_description" cols="5" rows="5" class="form-control">{{$room->room_description}}</textarea>
            @error('room_description')
                <small id="room_description" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('room')}}" class="btn btn-danger btn-flat">Cancel</a>
    </form>
</div>
@endsection
