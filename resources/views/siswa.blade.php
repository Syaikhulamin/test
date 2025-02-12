@extends('layout')
@section('content')
    <div class="container mt-5">
        <h1>Ini Halaman Siswa</h1>

        @foreach ($siswa as $item)
            <p>Halo Saya siswa, nama saya {{$item}}</p>
        @endforeach
    </div>
@endsection