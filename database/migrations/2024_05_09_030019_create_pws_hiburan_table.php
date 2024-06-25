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
        Schema::create('pws_hiburan', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique();
            $table->string('nama_pajak');
            $table->string('no_pengawasan');
            $table->date('tanggal');
            $table->string('sspd_path'); // Kolom untuk menyimpan path file upload Sspd
            $table->string('sptpd_path'); // Kolom untuk menyimpan path file upload Sptpd
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pws_hiburan');
    }
};