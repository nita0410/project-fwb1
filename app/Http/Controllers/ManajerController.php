<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManajerController extends Controller
{
    // Batasi akses hanya manajer
    private function hanyaManajer()
    {
        if (!Auth::check() || Auth::user()->role !== 'manajer') {
            abort(403, 'Akses ditolak: Hanya manajer yang dapat mengakses.');
        }
    }

    // 1. Laporan Semua Barang
    public function laporanBarang()
    {
        $this->hanyaManajer();

        $barang = DB::table('items')
            ->leftJoin('kategoris1', 'items.kategori_id', '=', 'kategoris1.id')
            ->select(
                'items.nama',
                'items.code',
                'items.specification',
                'items.condition',
                'items.location',
                'items.quantity',
                'kategoris1.nama as nama_kategori'
            )
            ->get();

        return view('manajer.laporan_barang', compact('barang'));
    }

    // 2. Riwayat Barang Masuk dari tabel elektroniks
    public function riwayatMasuk()
    {
        $this->hanyaManajer();

        $data = DB::table('elektroniks')
            ->join('items', 'elektroniks.item_id', '=', 'items.id')
            ->select(
                'elektroniks.*',
                'items.nama as nama_barang'
            )
            ->whereNotNull('elektroniks.tanggal_masuk')
            ->orderBy('elektroniks.tanggal_masuk', 'desc')
            ->get();

        return view('manajer.barang_masuk', compact('data'));
    }

    // 3. Persetujuan Barang Masuk
    public function setujuiMasuk($id)
    {
        $this->hanyaManajer();

        $barang = DB::table('elektroniks')->where('id', $id)->first();

        if (!$barang) {
            return redirect()->back()->with('error', 'Data barang tidak ditemukan.');
        }

        DB::table('elektroniks')->where('id', $id)->update([
            'disetujui' => true,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Barang masuk telah disetujui.');
    }
    
}

