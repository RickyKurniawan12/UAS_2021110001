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
                <th>status</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->description }}</td>
                <td>Rp{{ number_format($order->price, 2) }}</td>
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus order menu ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
