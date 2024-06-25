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
        Schema::create('wp', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique();
            $table->string('nama_pajak');
            $table->enum('jenis', ['hiburan', 'hotel','restoran']);
            $table->string('nama_kelola');
            // $table->string('username');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->decimal('omset', 20, 2); // Decimal untuk omset
            $table->decimal('pajak', 20, 2); // Decimal untuk pajak
            $table->string('sptpd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp');
    }
};