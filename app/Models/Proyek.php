<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_proyek';
    protected $fillable = ['id_proyek','nama_proyek', 'lokasi', 'tanggal_mulai', 'tanggal_akhir'];
}
