@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4>Barang Keluar</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.store_barang_keluar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <select name="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah Keluar</label>
            <input type="number" name="jumlah_keluar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <hr>
    <h5>Riwayat Barang Keluar</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $bk)
                <tr>
                    <td>{{ $bk->nama_barang }}</td>
                    <td>{{ $bk->jumlah_keluar }}</td>
                    <td>{{ $bk->tanggal_keluar }}</td>
                    <td>{{ $bk->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
