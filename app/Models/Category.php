<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category_222121';
    protected $primaryKey = 'id_category_222121';
    protected $fillable = [
       'category_222121',
    ];
    
    public function produk(){
       return $this->belongsTo(Produk::class, 'id_produk_222121');
    }

}
