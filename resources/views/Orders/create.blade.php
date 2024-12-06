@extends('layouts.app')

@section('title','Register New Order')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Registrasi Order</h1>
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
            
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" placeholder="id" name="id" required value="{{old('id')}}">
            </div>
              <!-- Product Name Dropdown -->
              <div class="form-group">
                <label for="name">Product Name</label>
                <select class="form-control" id="name" name="name" required>
                    <option value="" disabled selected>Select Product Name</option>
                    @foreach($menus as $menu) <!-- Loop through the menu items -->
                        <option value="{{ $menu->name }}" {{ old('name') == $menu->name ? 'selected' : '' }}>
                            {{ $menu->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Canceled" {{ old('status') == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" placeholder="Price" name="price" required value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label for="total_order">Total Order</label>
                <input type="number" class="form-control" id="total_order" placeholder="Total Order" name="total_order" value="{{ old('total_order') }}" min="1">
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" id="total_price" placeholder="Total Price" name="total_price" required value="{{ old('total_price') }}" readonly>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="product_image">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceInput = document.getElementById('price');
        const totalOrderInput = document.getElementById('total_order');
        const totalPriceInput = document.getElementById('total_price');

        // Function to update total price based on price * total order
        function updateTotalPrice() {
            const price = parseFloat(priceInput.value) || 0;
            const totalOrder = parseInt(totalOrderInput.value) || 0;

            const totalPrice = price * totalOrder;
            totalPriceInput.value = totalPrice.toFixed(2); // Set total price value with two decimal places
        }

        // Add event listeners to recalculate the total price whenever the price or total order changes
        priceInput.addEventListener('input', updateTotalPrice);
        totalOrderInput.addEventListener('input', updateTotalPrice);

        // Initial call to set the correct total price if values are pre-filled
        updateTotalPrice();
    });
</script>

@endsection
