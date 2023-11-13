<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;
    protected $table = 'irs';

    protected $fillable = [
        'semester_aktif',
        'jumlah_sks_diambil',
        'scan_irs',
        'status_validasi',
        'mahasiswa_id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'nim');
    }
}
