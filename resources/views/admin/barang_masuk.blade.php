@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4>Barang Masuk</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.store.barang_masuk') }}" method="POST">
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
            <label>Jumlah Masuk</label>
            <input type="number" name="jumlah_masuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <hr>
    <h5>Riwayat Barang Masuk</h5>
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
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
