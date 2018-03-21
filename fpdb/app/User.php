<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = ['name' , 'email' , 'province', 'city', 'district', 'zip', 'phone', 'gender'];
    protected $hidden = ['password'];
}

class User extends Model
{
    public function Invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}

class Invoice extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
