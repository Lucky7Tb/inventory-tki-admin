@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Add ruangan</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{route('room.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="room_name">Nama ruangan</label>
            <input type="text" name="room_name" id="room_name" class="form-control @error('room_name') is-invalid @enderror">
            @error('room_name')
                <small id="room_name_help" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="room_description">Keterangan ruangan</label>
            <textarea class="@error('room_description') is-invalid @enderror form-control" name="room_description" id="room_description" cols="5" rows="5" class="form-control"></textarea>
            @error('room_description')
                <small id="room_description" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('room')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
