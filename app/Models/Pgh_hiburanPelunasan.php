<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgh_hiburanPelunasan extends Model
{
    use HasFactory;

    protected $table = 'pgh_hiburan_pelunasan';

    protected $fillable = [
        'npwpd',
        'nama_pajak',
        // 'no_penagihan',
        'no_telepon',
        'tanggal',
        'tanggal_pelunasan',
        'omset',
        'pajak',
        // 'denda',
        'total'
    ];
}