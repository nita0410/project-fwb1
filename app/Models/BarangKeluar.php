<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Elektronik;


class BarangKeluar extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi (default: barang_keluars)
    protected $table = 'barang_keluar';

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'elektronik_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'keterangan',
    ];

    /**
     * Relasi BarangKeluar ke Elektronik (Many to One)
     */
    public function elektronik()
    {
        return $this->belongsTo(Elektronik::class, 'elektronik_id');
    }
}
