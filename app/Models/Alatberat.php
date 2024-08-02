<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alatberat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_alatberat';
    protected $fillable = ['id_alatberat','alatberat', 'jumlah','usia', 'harga', 'kondisi','penempatan','id_proyek','nama_proyek'];
}
