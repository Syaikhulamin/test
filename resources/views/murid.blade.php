@extends('layouts.layout')
@section('content')
    <div style="text-align: center">
        <h3>Ini Data Murid</h3>

        <br>
        <div class="row">
            <div class="col-md-8 col-md-6 m-auto">
                @forelse ($siswa as $item)
                    <li class="list-group-item">{{$item->nama}}</li>
                    <li class="list-group-item">{{$item->nip}}</li>
                    <li class="list-group-item">{{$item->email}}</li>
                    <li class="list-group-item">{{$item->alamat}}</li>
                    <li class="list-group-item">{{$item->kelas->nama}}</li>
                    <li class="list-group-item">{{$item->kelas->deskripsi}}</li>
                @empty
                    <div class="alert alert-primary d-inline-block">Tidak ada Data</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection