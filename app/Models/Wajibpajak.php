<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wp extends Model
{
    use HasFactory;

    protected $table = 'wp';
    protected $fillable = [
        'npwpd',
        'nanamapajakma_wp',
        'jenispajak',
        'namapengelola',
        'username',
        'nomortelepon',
        'alamat',
    ];
}