@extends('layouts.app')

@section('title', 'Peminjaman Management')

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
        <table class="table table-bordered table-hover text-center" id="returning-table">
            <div class="button"></div>
            <thead>
                <tr>
                    <th>Id peminjaman</th>
                    <th>Nama peminjam</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th>Tanggal pengembalian</th>
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
            $('#returning-table').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{route('returning.json')}}",
                columns: [
                    {data:"borrowing_id", name:"borrowing_id"},
                    {data:"student_id.student_name", name:"student_id.student_name"},
                    {data:"item_id.item_name", name:"item_id.item_name"},
                    {data:"borrowing_status", name:"borrowing_status"},        
                    {data:"borrowing_date_return", name:"borrowing_date_return"},       
                    {data:"aksi", name:"aksi", orderable: false, searchable: false},
                ],
            });
        });
    </script>
@endpush

