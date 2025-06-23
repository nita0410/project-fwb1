@extends('layout.master')

@section('isi')
<div class="container">
    <h2 class="mb-4">Data Barang Keluar</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Keterangan</th>
                <th>status</th>
                <th>ubah status</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataBarangKeluar as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->elektronik->nama_barang ?? '-' }}</td>
                    <td>{{ $barang->elektronik->kategori ?? '-' }}</td>
                    <td>{{ $barang->jumlah_keluar }}</td>
                    <td>{{ \Carbon\Carbon::parse($barang->tanggal_keluar)->format('d-m-Y') }}</td>
                    <td>{{ $barang->keterangan }}</td>                    
                    <td>{{ ucfirst($barang->status) }}</td>
                    <td>
                        <!-- Tombol ubah status -->
                        <form action="{{ route('ubahStatusBarangKeluar', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control d-inline" style="width:auto; display:inline-block;">
                                <option value="rusak" {{ $barang->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="dipinjamkan" {{ $barang->status == 'dipinjamkan' ? 'selected' : '' }}>Dipinjamkan</option>
                                <option value="dipindahkan" {{ $barang->status == 'dipindahkan' ? 'selected' : '' }}>dipindahkan</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                        </form>
                    </td>
                    <td>
                        @if($barang->gambar)
                            <img src="{{ asset('storage/gambar/' . $barang->gambar) }}" width="100" alt="Gambar Barang">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data barang keluar belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
