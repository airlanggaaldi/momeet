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
        Schema::create('properties', function (Blueprint $table) {
            $table->id('id_properti');
            $table->string('nama_properti');
            $table->integer('kapasitas');
            $table->string('jenis_properti');
            $table->string('deskripsi');
            $table->integer('rating');
            $table->string('gambar');
            $table->integer('harga');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_kota')->references('id_kota')->on('kotas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
