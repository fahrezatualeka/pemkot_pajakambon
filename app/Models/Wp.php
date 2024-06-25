<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wp extends Model
{
    protected $table = 'wp';

    protected $fillable = [
        'npwpd',
        'nama_pajak',
        'jenis',
        'nama_kelola',
        'no_telepon',
        'alamat',
        'omset',
        'pajak',
        'sptpd'
    ];
}