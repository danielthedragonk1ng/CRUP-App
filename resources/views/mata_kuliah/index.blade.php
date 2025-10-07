@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Judul dengan latar kuning -->
        <h1 class="title-highlight">Daftar Mata Kuliah</h1>

        <div class="card mt-3">
            <div class="card-body">
                @if(session('ok'))
                    <div class="alert alert-success">{{ session('ok') }}</div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('mata_kuliah.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
                </div>

                @if($items->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->sks }}</td>
                            <td>{{ $item->dosen?->nama }}</td>
                            <td>
                                <a href="{{ route('mata_kuliah.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('mata_kuliah.destroy', $item) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $items->links() }}
                @else
                    <p>Tidak ada data mata kuliah.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
