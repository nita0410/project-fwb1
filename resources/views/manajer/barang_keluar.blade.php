@extends('manajer.master_manajer')

@section('isi')
    <h3>📤 Riwayat Barang Keluar</h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Keluar</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->tujuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
