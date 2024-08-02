<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_material';
    protected $fillable = ['id_material','material', 'jumlah_awal', 'harga', 'jumlah_akhir'];
}
