<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'kab_kota',
        'propinsi',
        'angkatan',
        'jalur_masuk',
        'email',
        'handphone',
        'status',
        'foto_mahasiswa',
        'dosen_wali',
        'user_id',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dosenWali()
    {
        return $this->belongsTo(DosenWali::class, 'dosen_wali', 'nip');
    }
}
