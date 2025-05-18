<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;
    //
    protected $table = 'ukuran_222121';
    protected $primaryKey = "id_ukuran_222121";

    protected $fillable = [
        'ukuran_222121',
        'id_produk_222121',
        'stok_222121',


    ];
}
