<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;
    //
    protected $table = 'warna_222121';
    protected $primaryKey = "id_warna_222121";

    protected $fillable = [
        'warna_222121',
        'id_produk_222121',
        'foto_222121',
    ];
}
