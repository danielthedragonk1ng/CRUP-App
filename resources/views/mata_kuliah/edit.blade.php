@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mata_kuliah.update', $mata_kuliah) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $mata_kuliah->nama) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">SKS <small class="text-muted">(2-4)</small></label>
            <input type="number" name="sks" class="form-control" value="{{ old('sks', $mata_kuliah->sks) }}" min="2" max="4">
            <div class="form-text">Masukkan SKS antara 2 dan 4.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Dosen</label>
            <select name="dosen_id" class="form-select">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->id }}" {{ old('dosen_id', $mata_kuliah->dosen_id) == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
