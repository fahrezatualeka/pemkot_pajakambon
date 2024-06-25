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
        Schema::create('pgh_hiburan_pelunasan', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique(); // Angka dan huruf
            $table->string('nama_pajak'); // Hanya huruf
            // $table->string('no_penagihan'); // Menggunakan unsigned integer
            $table->string('no_telepon');
            $table->date('tanggal'); // Tanggal
            $table->date('tanggal_pelunasan'); // Tanggal
            $table->decimal('omset', 20, 2); // Decimal untuk omset
            $table->decimal('pajak', 20, 2); // Decimal untuk pajak
            // $table->decimal('denda', 20, 2); // Decimal untuk denda
            $table->decimal('total', 20, 2); // Decimal untuk total
            // $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pgh_hiburan_pelunasan');
    }
};