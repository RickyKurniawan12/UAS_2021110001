@extends('layouts.app')

@section('title', 'Memesan menu')

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
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm">
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
