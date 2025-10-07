@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Judul tanpa latar kuning -->
        <h1 class="page-title">Daftar Dosen</h1>

        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="mb-0">Daftar Dosen</h1>

                    <form class="d-flex" method="GET" action="{{ route('dosens.index') }}">
                        <input name="q" value="{{ request('q') }}" class="form-control me-2" placeholder="Cari nama dosen...">
                        <button class="btn btn-outline-secondary">Cari</button>
                    </form>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('dosens.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>

                @if($items->count())
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($items->currentPage()-1) * $items->perPage() }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ route('dosens.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dosens.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $items->withQueryString()->links() }}
                @else
                    <p class="mt-3">Tidak ada data dosen.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
