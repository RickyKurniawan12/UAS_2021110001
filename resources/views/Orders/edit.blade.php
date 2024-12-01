@extends('layouts.app')

@section('title', 'Update Order')

@section('content')
<h1>Edit Menu Order</h1>
<form action="{{ route('menus.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $order->name }}">
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" required value="{{ old('description', $order->description) }}">
    </div>
    <label>Price:</label>
    <input type="number" step="500" name="price" value="{{ $order->price }}">
    <button type="submit">Update Menu</button>
</form>
@endsection