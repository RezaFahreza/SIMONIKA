<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // inverse on to many ke tabel role
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Relasi ke tabel 'Mahasiswa'
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id');
    }

    // Relasi ke tabel 'DosenWali'
    public function dosenWali()
    {
        return $this->hasOne(DosenWali::class, 'user_id');
    }

    // Relasi ke tabel 'Operator'
    public function operator()
    {
        return $this->hasOne(Operator::class, 'user_id');
    }
}