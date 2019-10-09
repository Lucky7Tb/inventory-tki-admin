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
        <a href="{{route('item_category.create')}}" class="btn btn-rounded social-icon-btn btn-primary mb-3 mt-5"><i class="pl-1 mdi mdi-plus-outline"></i></a>
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
              ajax: "{{route('item.json')}}",
              columns: [
                  {data:"item_name", name:"item.item_name"},
                  {data:"item_ammount", name:"item.item_ammmount"},
                  {data:"itemcategory.item_category_name", name:"itemcategory.item_category_name"},
                  {data:"item_conditions", name:"item.item_conditions"},
                  {data:"room.room_name", name:"room.room_name"},
                  {data:"aksi", name:"aksi", orderable: false, searchable: false},
              ]
          });
        });
    </script>
@endpush
