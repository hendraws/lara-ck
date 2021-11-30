<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = ['program_akademik_id', 'kelas_id', 'waktu_mulai', 'waktu_selesai', 'token', 'judul', 'created_by', 'updated_by',];

    public function getProgramAkademik()
    {
        return $this->belongsTo(ProgramAkademik::class, 'program_akademik_id', 'id');
    }

    public function getKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function getMataPelajaran()
    {
        return $this->hasMany(UjianMataPelajaran::class, 'mata_pelajaran_id', 'id');
    }

    public function getSoal()
    {
        return $this->hasManyThrough(UjianSoal::class, UjianMataPelajaran::class, 'mata_pelajaran_id', 'ujian_mata_pelajaran_id', 'id', 'id');
    }
}
