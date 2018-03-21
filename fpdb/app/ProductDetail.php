<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';
}

class ProductDetail extends Model
{
    public function ProductDesc()
    {
        return $this->hasMany(ProductDesc::class);
    }
}

class ProductDesc extends Model
{
    public function ProductDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
