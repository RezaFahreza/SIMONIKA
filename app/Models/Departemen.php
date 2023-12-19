<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';
    protected $primaryKey = 'kode_departemen';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_departemen',
        'nama_departemen',
        'email',
        'foto',
        'user_id',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
