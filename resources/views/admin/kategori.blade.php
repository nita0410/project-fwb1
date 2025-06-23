@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kelola Kategori</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('kategori.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Kategori</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris1 as $kategori)
                        <tr>
                            <td>{{ $kategori->nama }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
