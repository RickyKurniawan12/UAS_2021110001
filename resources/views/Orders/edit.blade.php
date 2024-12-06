@extends('layouts.app')

@section('title', 'Update Order')

@section('content')
<h1>Edit Menu Order</h1>
<form action="{{ route('orders.update', $order) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" id="id" name="id" readonly value="{{ old('id', $order->id) }}">
    </div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $order->name) }}">
    </div>

    <div class="form-group">
        <label for="description">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Pending" {{ old('status', $order->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ old('status', $order->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Canceled" {{ old('status', $order->status) == 'Canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="500" id="price" name="price" class="form-control" value="{{ old('price', $order->price) }}">
    </div>

    <div class="form-group">
        <label for="total_order">Total Order:</label>
        <input type="number" step="1" id="total_order" name="total_order" class="form-control" value="{{ old('total_order', $order->total_order) }}">
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">Update Menu</button>
</form>
@endsection
