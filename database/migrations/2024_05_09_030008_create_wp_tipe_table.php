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
        Schema::create('wp_tipe', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique();
            $table->string('nama_pajak');
            $table->enum('jenis', ['hiburan', 'hotel', 'restoran']);
            $table->integer('tarif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp_tipe');
    }
};