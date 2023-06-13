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
        Schema::create('riwayatpelatihan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelatihan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('datapeserta_id')->unsigned();
            $table->date('tglpendaftaran');
            $table->string('nopendaftaran', 30);
            $table->enum('status_pendaftaran', ['Menunggu Konfirmasi', 'Lolos', 'Tidak Lolos','Sedang Pelatihan', 'Lulus', 'Tidak Lulus']);
            $table->timestamps();
        });

        Schema::table('riwayatpelatihan', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelatihan_id')->references('id')->on('pelatihan')
            ->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('datapeserta_id')->references('id')->on('datapeserta')
            // ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayatpelatihan');
    }
};
