<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSiswa extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','ujian_id', 'waktu_berjalan', 'status', ];

    public function getSiswa()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
