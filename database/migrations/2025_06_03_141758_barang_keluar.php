<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

        public function up()
    {
    Schema::create('barang_keluar', function (Blueprint $table) {
        $table->id();
        $table->foreignId('elektronik_id')->constrained('elektroniks')->onDelete('cascade');
        $table->date('nama_barang');
        $table->integer('jumlah_keluar');
        $table->date('tanggal_keluar');
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
