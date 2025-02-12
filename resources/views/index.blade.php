@extends('layout')
@section('content')
    
    <div class="container mt-5">
        <h1>Ini Halaman Kelas</h1>

        <p>Selamat Datang di Kelas {{ $kelas }}</p>
        {{-- <p>Kela Ada {{ $jumlah_kelas }}</p> --}}

        {{-- <p>ID Halaman ini adalah {{ $id }}</p> --}}

        {{-- @if ($jumlah_kelas == 0)
            <p>Kelas Kosong</p>
        @else
            @foreach ($kelas as $kelas)
                <p>Ini {{ $kelas }}</p>
            @endforeach
        @endif --}}

    </div>

@endsection
