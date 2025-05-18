<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Produk;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleri_222121';
    protected $primaryKey = 'id_galleri_222121';
    protected $fillable = [
       'id_produk_222121',
       'foto_222121',
    ];

    public function produks(){
       return $this->belongsTo(Produk::class, 'id_produk_222121');
    }
}
