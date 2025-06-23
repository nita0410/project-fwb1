@extends('layout.master1')

@section('isi')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header text-center">
            <h5>Form Input Data Barang Elektronik</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($elektronik as $elt)
                            <option value="{{ $elt }}">{{ $elt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <div class="form-group">
                    <label for="status">Status Barang</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="rusak">Rusak</option>
                        <option value="dalam perbaikan">Dalam Perbaikan</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
