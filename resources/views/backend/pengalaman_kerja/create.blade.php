@extends('backend.layout.template')

@section('content')
<div class="container mt-4">
    <h3>{{ isset($pengalaman_kerja) ? 'Edit Pengalaman Kerja' : 'Tambah Pengalaman Kerja' }}</h3>

    <form class="form-validate form-horizontal" id="pengalaman_kerja_form" method="POST"
        action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
        @csrf
        @if(isset($pengalaman_kerja)) @method('PUT') @endif
        <input type="hidden" name="id" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->id : '' }}">

        <div class="mb-3">
            <label>Nama Perusahaan</label>
            <!-- Acara 14 -->
            <input type="text" name="nama" class="form-control" minlength="5"
                value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}"
                required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" minlength="2"
                value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}"
                required>
        </div>

        <div class="mb-3">
            <label>Tahun Masuk</label>
            <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control"
                value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}"
                required>
        </div>

        <div class="mb-3">
            <label>Tahun Keluar</label>
            <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control"
                value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}"
                required>
        </div>
        <!-- Acara 14 -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
