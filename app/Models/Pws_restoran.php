<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pws_restoran extends Model
{
    protected $table = 'pws_restoran';
    protected $fillable = [
        'npwpd',
        'nama_pajak',
        'no_pengawasan',
        'tanggal',
        'sspd_path',
        'sptpd_path',
    ];
}
