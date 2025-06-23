<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class disetujui extends Migration
{
    public function up(): void
    {
        // Tambah kolom disetujui ke tabel barang_masuk
        Schema::table('elektroniks', function (Blueprint $table) {
            $table->boolean('disetujui')->default(false);
        });

        // Tambah kolom disetujui ke tabel barang_keluar
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->boolean('disetujui')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('elektroniks', function (Blueprint $table) {
            $table->dropColumn('disetujui');
        });

        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->dropColumn('disetujui');
        });
    }
}
