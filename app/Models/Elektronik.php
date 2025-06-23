<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\barangKeluar;

class Elektronik extends Model
{
    protected $table = 'elektroniks';
    protected $fillable = [
        'nama_barang', 'kategori', 'stok', 'harga', 'gambar',
    ]; 

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'elektronik_id');
    }
  
}

