<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Elektronik;
use App\Models\BarangKeluar;

class ElektronikController extends Controller
{
    public function index()
    {
        $elektronik = ['Laptop', 'Handphone', 'TV', 'Komputer'];
        return view('elektro.input_data_barang', compact('elektronik'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_barang', 'public');
            $validated['gambar'] = $gambarPath;
        }

        Elektronik::create($validated);

        return redirect()->route('barang.index')->with('success', 'Data berhasil disimpan!');
    }
    public function data_elekro()
    {
        $dataBarang = Elektronik::all();
        return view('elektro.tampil_data', compact('dataBarang'));
    }
    public function ubahStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:dipinjam,rusak,dalam perbaikan'
        ]);

        $barang = Elektronik::findOrFail($id);
        $barang->status = $request->status;
        $barang->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    public function create()
    {
        $barangkeluar = Elektronik::all();
        return view('elektro.input_barang_keluar', compact('barangkeluar'));
    }

        public function input_barang_keluar(Request $request)
    {
        $request->validate([
            'elektronik_id' => 'required|exists:elektroniks,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        BarangKeluar::create([
            'elektronik_id' => $request->elektronik_id,
            'jumlah_keluar' => $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('home')->with('success', 'Data barang keluar berhasil disimpan.');
    }

    public function tampil_barang_keluar()
    {
        $dataBarangKeluar = BarangKeluar::with('elektronik')->get();
        return view('elektro.tampil_data_keluar', compact('dataBarangKeluar'));
    }
    public function statusBarangKeluar(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:rusak, dipinjam, dipindahkan'
        ]);

        $barang = BarangKeluar::findOrFail($id);
        $barang->status = $request->status;
        $barang->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
