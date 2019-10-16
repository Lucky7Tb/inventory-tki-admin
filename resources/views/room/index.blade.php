@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
<div class="container mt-2 responsive-table">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{route('room.create')}}" class="btn btn-rounded social-icon-btn btn-primary mb-3 mt-5"><i class="pl-1 mdi mdi-plus-outline"></i></a>

        <table class="table table-bordered table-hover text-center" id="room-table">
            <thead>
                <tr>
                    <th>Nama ruangan</th>
                    <th>Deskripsi ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection


@push('scripts')
    <script>
        $('document').ready(function () {
            $('#room-table').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{route('room.json')}}",
                columns: [
                    {data:"room_name", name:"room_name"},
                    {data:"room_description", name:"room_description"},
                    {data:"aksi", name:"aksi", orderable: false, searchable: false},
                ]
            }); 
        });
    </script>
@endpush