<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('pelatihan', 50);
            $table->date('tglmulaipelatihan');
            $table->date('tglakhirpelatihan');
            $table->date('tglmulaipendaftaran');
            $table->date('tglakhirpendaftaran');
            $table->string('lokasi', 100);
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->string('gambar');
            $table->enum('status', ['Buka', 'Tutup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
