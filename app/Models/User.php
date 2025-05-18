<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_222121';
    protected $primaryKey = 'id_user_222121';

    protected $authPasswordName = 'password_222121';
    protected $fillable = [
       'nama_222121',
       'alamat_222121',
       'email_222121',
       'password_222121',
       'role_222121',
       'foto_222121',
    ];

}
  
