<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart_222121';
    protected $primaryKey = 'id_cart_222121';
    protected $fillable = [
       'id_produk_222121',
       'id_user_222121',
       'id_discount_222121',
       'id_ukuran_222121',
       'id_warna_222121',
       'jumlah_222121',
       'total_222121',
       'kode_222121',
       'ukuran_222121',
       'status_222121',
    ];

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk_222121');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user_222121');
    }
    public function ukuran(){
        return $this->belongsTo(Ukuran::class, 'id_ukuran_222121');
    }
    public function warna(){
        return $this->belongsTo(Warna::class, 'id_warna_222121');
    }

    public function discount(){
        return $this->belongsTo(Discount::class, 'id_discount_222121');
    }
}
