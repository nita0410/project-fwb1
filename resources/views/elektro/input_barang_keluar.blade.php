@extends('layout.master1')

@section('isi')
<div class="container">
    <h3 class="mb-4">Form Input Barang Keluar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('barang_keluar.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="elektronik_id">Nama Barang</label>
            <select name="elektronik_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangkeluar as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }} - {{ $barang->merk }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_keluar">Jumlah Keluar</label>
            <input type="number" name="jumlah_keluar" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
