<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount_222121';
    protected $primaryKey = 'id_discount_222121';
    protected $fillable = [
       'kode_222121',
       'discount_222121',
       'batas_222121',
    ];
}
