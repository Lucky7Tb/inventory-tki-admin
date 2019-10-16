@extends('layouts.app')

@section('title', 'Item Category Management')

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
    <form action="{{route('item_category.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="item_category_name">Nama kategori</label>
            <input type="text" name="item_category_name" id="item_category_name" class="form-control @error('item_category_name') is-invalid @enderror">
            @error('item_category_name')
                <small id="item_category_name" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_category_description">Keterangan</label>
            <textarea name="item_category_description" id="item_category_description" cols="5" rows="5" class="form-control @error('item_category_description') is-invalid @enderror"></textarea>
            @error('item_category_description')
                <small id="item_category_description" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('item_category')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
