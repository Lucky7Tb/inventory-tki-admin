@extends('layouts.app')

@section('title', 'Item Category Management')

@section('content')
<div class="container mt-2">
    <h3 class="lead mb-3">Update kategori</h3>
    <div class="float-right">
        <form action="{{route('item_category.delete')}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-rounded social-icon-btn btn-primary" onclick="return confirm('Yakin ingin mengahapusnya?')"><i class="mdi mdi-delete-outline"></i></button>
            <input type="hidden" name="item_category_id" value="{{$item_category->item_category_id}}">
        </form>
    </div>
    <form action="{{route('item_category.update')}}" method="post" class="mt-5">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="hidden" name="item_category_id" value="{{$item_category->item_category_id}}">
            <label for="item_category_name">Nama kategori</label>
            <input type="text" name="item_category_name" id="item_category_name" class="form-control @error('item_category_name') is-invalid @enderror" value="{{$item_category->item_category_name}}">
            @error('item_category_name')
                <small id="item_category_name" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_category_description">Keterangan</label>
            <textarea name="item_category_description" id="item_category_description" cols="5" rows="5" class="form-control @error('item_category_description') is-invalid @enderror">{{$item_category->item_category_description}}</textarea>
            @error('item_category_description')
                <small id="item_category_description" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-flat">Save</button>
        <a href="{{route('item_category')}}" class="btn btn-outline-dark btn-flat">Cancel</a>
    </form>
</div>
@endsection
