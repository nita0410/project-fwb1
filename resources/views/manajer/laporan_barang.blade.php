@extends('manajer.master_manajer')

@section('content')
    <h3 class="mb-4">Laporan Semua Barang</h3>

    <div class="table-responsive card p-3">
        <table class="table table-bordered table-striped">
            <thead>
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
                @forelse ($barang as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->code ?? '-' }}</td>
                        <td>{{ $item->specification ?? '-' }}</td>
                        <td>{{ $item->condition ?? '-' }}</td>
                        <td>{{ $item->location ?? '-' }}</td>
                        <td>{{ $item->quantity ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
