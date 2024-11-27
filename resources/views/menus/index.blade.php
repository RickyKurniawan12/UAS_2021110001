@extends('layouts.app')

@section('title', 'Update menu')

@section('content')
<div class="container">
    <h1>Daftar Menu</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->description }}</td>
                <td>Rp{{ number_format($menu->price, 2) }}</td>
                <td>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
