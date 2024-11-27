@extends('layouts.app')

@section('title', 'Update Order')

@section('content')
<h1>Edit Menu Order</h1>
<form action="{{ route('orders.update', $menu) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $menu->name }}">
    <label>Description:</label>
    <textarea name="description">{{ $menu->description }}</textarea>
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="{{ $menu->price }}">
    <button type="submit">Order Menu</button>
</form>
@endsection