<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    
    use HasFactory;

    protected $table = 'produk_222121';
    protected $primaryKey = 'id_produk_222121';
    protected $fillable = [
       'nama_222121',
       'deskripsi_222121',
       'thumbnail_222121',
       'id_category_222121',
       'harga_222121',
    ];

    public function gallery(){
       return $this->hasMany(Gallery::class, 'id_produk_222121');
    }

    public function ukuran(){
        return $this->hasMany(Ukuran::class, 'id_produk_222121');
    }
    public function warna(){
        return $this->hasMany(Warna::class, 'id_produk_222121');
    }

}
