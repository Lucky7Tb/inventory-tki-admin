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
        <a href="{{route('borrowing.create')}}" class="btn btn-rounded social-icon-btn btn-primary mb-3 mt-5"><i class="pl-1 mdi mdi-plus-outline"></i></a>
        <table class="table table-bordered table-hover text-center" id="borrowing-table">
            <div class="button"></div>
            <thead>
                <tr>
                    <th>Peminjam</th>
                    <th>Kelas</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal pengembalian</th>
                    <th>Status peminjaman</th>
                    <th>Konfirmasi</th>
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
          $('#borrowing-table').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{route('borrowing.json')}}",
                columns: [
                    {data:"student_id.student_name", name:"student_id.student_name"},
                    {data:"student_id.student_class", name:"student_id.student_class"},
                    {data:"item_id.item_name", name:"item_id.item_name"},
                    {data:"item_ammount", name:"item_ammount"},
                    {data:"borrowing_date_return", name:"borrowing_date_return"},
                    {data:"borrowing_status", name:"borrowing_status"},
                    {data:"status", name:"status"},
                    {data:"aksi", name:"aksi", orderable: false, searchable: false},
                ],
            });
        });
    </script>
@endpush

