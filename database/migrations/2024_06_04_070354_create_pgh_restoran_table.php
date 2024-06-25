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
        Schema::create('pgh_restoran', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('npwpd')->unique(); // Angka dan huruf
            $table->string('nama_pajak'); // Hanya huruf
            // $table->string('no_penagihan'); // Menggunakan unsigned integer
            $table->string('no_telepon'); // Menggunakan unsigned integer
            $table->date('tanggal'); // Tanggal
            $table->decimal('omset', 20, 2); // Decimal untuk omset
            $table->decimal('pajak', 20, 2); // Decimal untuk pajak
            // $table->decimal('denda', 20, 2); // Decimal untuk denda
            $table->decimal('total', 20, 2); // Decdimal untuk total
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pgh_restoran');
    }
};