<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perkakas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_perkakas';
    protected $fillable = ['id_perkakas','perkakas', 'jumlah', 'harga', 'kondisi','id_proyek','nama_proyek'];
}
