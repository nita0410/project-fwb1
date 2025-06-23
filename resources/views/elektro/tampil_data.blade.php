@extends('layout.master')

@section('isi')
<div class="container">
    <h2 class="mb-4">Data Barang Elektronik</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>status</th>
                <th>perubahan status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataBarang as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->merk }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>
                        @if($barang->gambar)
                            <img src="{{ asset('storage/gambar/' . $barang->gambar) }}" width="100" alt="Gambar Barang">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ ucfirst($barang->status) }}</td>
                    <td>
                        <!-- Tombol ubah status -->
                        <form action="{{ route('barang.ubahStatus', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control d-inline" style="width:auto; display:inline-block;">
                                <option value="dipinjam" {{ $barang->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="rusak" {{ $barang->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="dalam perbaikan" {{ $barang->status == 'dalam perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
