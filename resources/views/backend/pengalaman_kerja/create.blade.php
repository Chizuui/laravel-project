@extends('backend.layout.template')

@section('content')
<div class="container mt-4">
    <h3>Tambah Pengalaman Kerja</h3>

    <form action="{{ route('pengalaman_kerja.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun Masuk</label>
            <input type="number" name="tahun_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun Keluar</label>
            <input type="number" name="tahun_keluar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection