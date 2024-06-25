<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wp_tipe extends Model
{
    protected $table = 'wp_tipe';

    protected $fillable = [
        'npwpd',
        'nama_pajak',
        'jenis',
        'tarif'
    ];
}