@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Data Barang Elektronik</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode</th>
                    <th>Spesifikasi</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori ?? '-' }}</td>
                        <td>{{ $item->kode ?? '-' }}</td>
                        <td>{{ $item->spesifikasi ?? '-' }}</td>
                        <td>{{ $item->kondisi ?? '-' }}</td>
                        <td>{{ $item->lokasi ?? '-' }}</td>
                        <td>{{ $item->jumlah ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
