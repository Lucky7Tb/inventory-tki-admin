@extends('layouts.app')

@section('title', 'Item Category Management')

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
            <table class="table table-bordered table-hover text-center" id="item_category-table">
                <thead>
                    <tr>
                        <th>Kategori Barang</th>
                        <th>Keterangan</th>
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
          $('#item_category-table').DataTable({
              processing: true,
              serverside: true,
              responsive: true,
              ajax: "{{route('item_category.json')}}",
              columns: [
                  {data:"item_category_name", name:"item_category_name"},
                  {data:"item_category_description", name:"item_category_description"},
                  {data:"aksi", name:"aksi", orderable: false, searchable: false},
              ]
          });
        });
    </script>
@endpush
