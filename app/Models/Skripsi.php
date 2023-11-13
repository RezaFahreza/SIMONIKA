<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $table = 'skripsi';

    protected $fillable = [
        'status',
        'semester',
        'nilai_skripsi',
        'scan_berita_acara_sidang_skripsi',
        'tanggal_lulus_sidang',
        'lama_studi_semester',
        'status_validasi',
        'mahasiswa_id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'nim');
    }
}
