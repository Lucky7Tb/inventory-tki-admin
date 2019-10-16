@extends('layouts.app')

@section('title', 'Item Management')

@section('content')
<div class="container mt-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{route('item.create')}}" class="btn btn-rounded social-icon-btn btn-primary mb-3 mt-5"><i class="pl-1 mdi mdi-plus-outline"></i></a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="item-table">
                <thead>
                    <tr>
                        <th>Nama barang</th>
                        <th>Jumlah barang</th>
                        <th>Kategori barang</th>
                        <th>Kondisi barang</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
          $('#item-table').DataTable({
              processing: true,
              serverside: true,
              responsive: true,
              ajax: "{{route('item.json')}}",
              columns: [
                  {data:"item_name", name:"item_name"},
                  {data:"item_ammount", name:"item_ammmount"},
                  {data:"item_category_id", name:"item_category_id"},
                  {data:"item_conditions", name:"item_conditions"},
                  {data:"room_id", name:"room_id"},
                  {data:"aksi", name:"aksi", orderable: false, searchable: false},
              ]
          });
        });
    </script>
@endpush
