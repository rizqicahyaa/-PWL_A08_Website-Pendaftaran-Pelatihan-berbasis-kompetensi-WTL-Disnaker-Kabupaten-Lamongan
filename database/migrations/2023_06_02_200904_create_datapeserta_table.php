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
        Schema::create('datapeserta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->char('nik', 16)->unique();
            $table->string('nohp', 25);
            $table->integer('umur');
            $table->text('alamatktp');
            $table->text('alamatdomisili');
            $table->string('pasfoto');
            $table->string('ijazah');
            $table->string('ktp');
            $table->string('skd')->nullable();
            $table->timestamps();
        });

        Schema::table('datapeserta', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapeserta');
    }
};
