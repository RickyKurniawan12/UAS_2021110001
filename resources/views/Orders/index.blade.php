@extends('layouts.app')

@section('title', 'Update Order')

@section('content')
<div class="container">
    <h1>Daftar Menu</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Tambah Order</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Total orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->description }}</td>
                <td>Rp{{ number_format($order->price, 2) }}</td>
                <td>{{ $order->items_count }}</td> <!-- items_count berasal dari withCount -->
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus order menu ini?')">Hapus</button>
                    </form>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>  
                </td>
            </tr>
            @endforeach
        </tbody>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                Logout
            </button>
        </form>  
    </table>
</div>
@endsection
