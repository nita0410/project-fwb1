<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    private function hanyaAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak: Hanya admin yang dapat mengakses.');
        }
    }

    // === DASHBOARD ===
    public function index()
    {
        $this->hanyaAdmin();
        return view('admin.dashboard');
    }

    // === DATA BARANG ===
    public function dataBarang()
    {
        $this->hanyaAdmin();

        $items = DB::table('items')
           ->leftJoin('kategoris1', 'items.category_id', '=', 'kategoris1.id')
            ->select(
                'items.id',
                'items.nama',
                'items.code',
                'items.specification',
                'items.condition',
                'items.location',
                'items.quantity',
                'kategoris1.nama as kategori'
            )
            ->get();

        return view('admin.data_barang', compact('items'));
    }

    public function createBarang()
    {
        $this->hanyaAdmin();
        $kategoris1 = DB::table('kategoris1')->get();  
        return view('admin.create_barang', compact('kategoris1'));
    }

    public function storeBarang(Request $request)
    {
        $this->hanyaAdmin();
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris1,id',
            'code' => 'required|string|unique:items,code',
            'specification' => 'nullable|string',
            'condition' => 'required|in:baik,rusak,dalam perbaikan',
            'location' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);

        DB::table('items')->insert([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'code' => $request->code,
            'specification' => $request->specification,
            'condition' => $request->condition,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.barang')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function editBarang($id)
    {
        $this->hanyaAdmin();
        $item = DB::table('items')->where('id', $id)->first();
        $kategoris1 = DB::table('kategoris1')->get();
        return view('admin.edit_barang', compact('item', 'kategoris1'));
    }

    public function updateBarang(Request $request, $id)
    {
        $this->hanyaAdmin();
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'code' => "required|string|unique:items,code,$id",
            'specification' => 'nullable|string',
            'condition' => 'required|in:baik,rusak,dalam perbaikan',
            'location' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);

        DB::table('items')->where('id', $id)->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'code' => $request->code,
            'specification' => $request->specification,
            'condition' => $request->condition,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.barang')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroyBarang($id)
    {
        $this->hanyaAdmin();
        DB::table('items')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data barang berhasil dihapus.');
    }

    // === KATEGORI ===
    public function kategori()
{
    $kategoris1 = DB::table('kategoris1')->get();

    if ($kategoris1->isEmpty()) {
        DB::table('kategoris1')->insert([
            ['nama' => 'Laptop'],
            ['nama' => 'Handphone'],
            ['nama' => 'Komputer'],
            ['nama' => 'HP'],
            ['nama' => 'Aksesoris'],
        ]);

        $kategoris1 = DB::table('kategoris1')->get(); 
    }
    return view('admin.kategori', compact('kategoris1')); 
    }


    public function storeKategori(Request $request)
    {
        $this->hanyaAdmin();
        $request->validate(['nama' => 'required|string|max:100']);
        DB::table('kategoris1')->insert([
            'nama' => $request->nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroyKategori($id)
    {
        $this->hanyaAdmin();
        DB::table('kategoris1')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }

    // === PENGGUNA ===
    public function pengguna()
    {
        $this->hanyaAdmin();
        $users = User::all();
        return view('admin.pengguna', compact('users'));
    }

    public function destroyPengguna($id)
    {
        $this->hanyaAdmin();
        $user = User::findOrFail($id);
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Admin tidak dapat dihapus.');
        }
        $user->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function updatePengguna(Request $request, $id)
    {
        $this->hanyaAdmin();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'role' => 'required|in:admin,user',
        ]);
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Pengguna berhasil diperbarui.');
    }

    // === BACKUP ===
    public function backup()
    {
        $this->hanyaAdmin();
        return view('admin.backup');
    }

    // === BARANG MASUK ===
    public function barangMasuk()
    {
        $this->hanyaAdmin();
        $items = DB::table('items')->get();
        $barang = DB::table('elektroniks')
            ->join('items', 'elektroniks.item_id', '=', 'items.id')
            ->select('elektroniks.*', 'items.nama as nama_barang')
            ->orderBy('elektroniks.tanggal_masuk', 'desc')
            ->get();
        return view('admin.barang_masuk', compact('barang', 'items'));
    }

    public function storeBarangMasuk(Request $request)
    {
        $this->hanyaAdmin();
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'stok ' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::table('elektroniks')->insert([
            'item_id' => $request->item_id,
            'stok ' => $request->jumlah_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->where('id', $request->item_id)
            ->increment('quantity', $request->jumlah_masuk);

        return redirect()->back()->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    // === BARANG KELUAR ===
    public function barangKeluar()
    {
        $this->hanyaAdmin();
        $items = DB::table('items')->get();
        $barangKeluar = DB::table('barang_keluar')
            ->join('items', 'barang_keluar.item_id', '=', 'items.id')
            ->select('barang_keluar.*', 'items.nama as barang')
            ->orderBy('barang_keluar.tanggal_keluar', 'desc')
            ->get();
        return view('admin.barang_keluar', compact('barangKeluar', 'items'));
    }

    public function storeBarangKeluar(Request $request)
    {
        $this->hanyaAdmin();
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $item = DB::table('items')->where('id', $request->item_id)->first();
        if ($item->quantity < $request->jumlah_keluar) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        DB::table('barang_keluar')->insert([
            'item_id' => $request->item_id,
            'jumlah_keluar' => $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->where('id', $request->item_id)
            ->decrement('quantity', $request->jumlah_keluar);

        return redirect()->back()->with('success', 'Data barang keluar berhasil dicatat.');
    }
}
