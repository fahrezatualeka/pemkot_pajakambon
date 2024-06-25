<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getPlainPasswordAttribute()
    {
    // Hanya contoh sederhana untuk mengambil password tanpa hashing
    // Ini tidak disarankan dalam penggunaan produksi
    return $this->attributes['password'];
    }
    
     protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'no_telepon',
        'alamat',
        'kode',
    ];    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}