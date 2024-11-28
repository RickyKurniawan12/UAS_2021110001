@extends('layouts.app')

@section('title', 'Update menu')

@section('content')
<h1>Edit Menu</h1>
<form action="{{ route('menus.update', $menu) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $menu->name }}">
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" required value="{{ old('description', $menu->description) }}">
    </div>
    <label>Price:</label>
    <input type="number" step="500" name="price" value="{{ $menu->price }}">
    <button type="submit">Update Menu</button>
</form>
@endsection