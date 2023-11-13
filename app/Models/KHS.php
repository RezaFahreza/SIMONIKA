<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;
    protected $table = 'khs';

    protected $fillable = [
        'semester_aktif',
        'jumlah_sks_semester',
        'sks_kumulatif',
        'ip_semester',
        'ip_kumulatif',
        'scan_khs',
        'status_validasi',
        'mahasiswa_id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'nim');
    }
}
