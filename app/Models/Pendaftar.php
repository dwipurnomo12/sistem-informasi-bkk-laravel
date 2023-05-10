<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['nama', 'jurusan', 'asal_sekolah', 'jenis_kelamin', 'kode_pendaftaran', 'user_id', 'lowongan_id'];
    
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
