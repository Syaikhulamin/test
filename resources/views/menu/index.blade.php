@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Daftar Menu</h2>
    <table class="table table-bordered table-striped">
        {{-- add button to create new menu --}}
        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

        {{-- // add alert from controller success or error --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>  
        @endif  
        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>  
        @endif
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                {{-- <th>Gambar</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($menu as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                {{-- <td>
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" width="100">
                </td> --}}
                {{-- // add button to edit and delete --}}
                <td>
                    <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('menu.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tidak ada data!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection