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
        Schema::create('prs_restoran', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique();
            $table->string('nama_wajib_pajak');
            $table->string('no_pemeriksaan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prs_restoran');
    }
};
