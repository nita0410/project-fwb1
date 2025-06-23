<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Gunakan nama tabel yang sesuai dengan migration
    protected $table = 'regis';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        // Hapus ini kalau tidak ada di tabel:
        // 'remember_token',
    ];

    // Hapus 'email_verified_at' kalau tidak ada di tabel
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime', // Hapus jika tidak digunakan
            'password' => 'hashed',
        ];
    }
}
