<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgh_hotel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;

    protected $table = 'pgh_hotel';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'npwpd',
        'nama_pajak',
        // 'no_penagihan',
        'no_telepon',
        'tanggal',
        'omset',
        'pajak',
        // 'denda',
        'total'
        // 'status'
    ];
}