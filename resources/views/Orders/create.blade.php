@extends('layouts.app')

@section('title','Register New Order')

@section('content')

<div class="'mt-4 p-5 bg-black text-white rounded">
    <h1>Resgistrasi Order</h1>
</div>
<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action={{route('orders.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class=" form-group">
                <label for="product_name">ID</label>
                <input type="text" class="form-control" id="id"placeholder="id" name="id" required value="{{old('id')}}">
            </div>
            <div class=" form-group">
                <label for="product_name">Product_name</label>
                <input type="text" class="form-control" id="name"placeholder="Product Name" name="name" required value="{{old('name')}}">
            </div>
            <div class=" form-group">
                <label for="description">Status</label>
                <input type="text" class="form-control" id="description" placeholder="description" name="description" required value="{{old('description')}}">
            </div>
            <div class=" form-group">
                <label for="retail_price">Price</label>
                <input type="text" class="form-control" id="price"placeholder="price" name="price" value="{{old('price')}}">
            </div>
            <div class=" form-group">
                <label for="product_image">product_image</label>
                <input type="file" class="form-control" id="product_image"name="product_image">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">save</button>
        </form>
    </div>
</div>

@endsection