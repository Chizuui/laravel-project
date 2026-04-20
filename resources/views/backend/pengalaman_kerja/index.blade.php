@extends('backend.layout.template')

@section('content')
<div class="container mt-4">
    <h3>Riwayat Hidup</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary mb-3">
        Tambah
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Jabatan</th>
                <th>Tahun Masuk</th>
                <th>Tahun Keluar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengalaman_kerja as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>{{ $item->tahun_keluar }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection