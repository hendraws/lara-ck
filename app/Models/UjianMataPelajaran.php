<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianMataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [ 'ujian_id', 'mata_pelajaran_id', 'jumlah_soal', 'passing_grade' ];
}
