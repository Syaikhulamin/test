@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Daftar Menu</h2>
    <table class="table table-bordered table-striped">
        {{-- add button to create new menu --}}
        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menu as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>
                    <img src="{{ asset('/storage/menu/'.$item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" width="100">
                </td>
                <td>
                    <a href="{{ route('kursi', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('menu.destroy', $item->id) }}" method="post" id="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger delete-button" data-id="{{ $item->id }}">Hapus</button>
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
@push('scripts')
    <script>
        $(document).ready(function(){
            $(".delete-button").on("click", function(e) {
                e.preventDefault(); // Mencegah aksi default tombol
                let itemId = $(this).data("id"); // Mengambil ID dari tombol

                if (confirm("Are you sure you want to delete this item?")) {
                    // Jika dikonfirmasi, jalankan aksi (misalnya, hapus dari database)
                    alert("Menu Berhasil dihapus!");
                    
                   $('#form-delete').submit();
                } else {
                    alert("Deletion canceled.");
                }
            });
        });
    </script>

@endpush