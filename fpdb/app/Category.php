<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
}

class Category extends Model
{
    public function ProductDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }
}

class ProductDetail extends Model
{
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
