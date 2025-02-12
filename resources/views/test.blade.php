@extends('layouts.layout')
@section('content')
<div class="container mt-5">

    <h1 >Saya Adalah halaman View Test</h1>

    <h1>Data Siswa</h1>
    @if (count($siswa) == 0)
        <h2>Tidak ada data siswa</h2>
    @else
        @foreach ($siswa as $key =>$siswa)
            <h2>{{$key+1}}</h2>
            <h2>{{$siswa->nama}}</h2>
            <h2>{{$siswa->kelas->nama}}</h2>
            <hr>
            
        @endforeach
    @endif

</div>

@endsection