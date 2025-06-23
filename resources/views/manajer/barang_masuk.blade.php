@extends('manajer.master_manajer')

@section('content')
    <h3 class="mb-4">Riwayat Barang Masuk</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive card p-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah</th>
                    <th>Status Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->tanggal_masuk }}</td>
                        <td>{{ $barang->jumlah ?? '-' }}</td>
                        <td>
                            @if($barang->disetujui)
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                            @endif
                        </td>
                        <td>
                            @if(!$barang->disetujui)
                                <form method="POST" action="{{ route('manajer.setujui.masuk', $barang->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-approve" onclick="return confirm('Setujui barang ini?')">Setujui</button>
                                </form>
                            @else
                                <em>-</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data barang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
