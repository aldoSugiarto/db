<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
}

class Cart extends Model
{
    public function ProductDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }
}

class ProductDetail extends Model
{
    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
}

class Cart extends Model
{
    public function Invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}

class Invoice extends Model
{
    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
