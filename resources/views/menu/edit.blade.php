@extends('layouts.app')

@section('content')
<div class="container">

    @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>  
    @endif

    <h2 class="my-4">Edit Menu</h2>
    <a href="{{ route('menu.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $menu->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $menu->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>            
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $menu->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection