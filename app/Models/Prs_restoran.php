<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prs_restoran extends Model
{
    protected $table = 'prs_restoran';

    protected $fillable = [
        'npwpd',
        'nama_wajib_pajak',
        'no_pemeriksaan',
        'tanggal'
    ];
}