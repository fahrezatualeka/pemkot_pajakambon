<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prs_hotel extends Model
{
    protected $table = 'prs_hotel';

    protected $fillable = [
        'npwpd',
        'nama_wajib_pajak',
        'no_pemeriksaan',
        'tanggal'
    ];
}