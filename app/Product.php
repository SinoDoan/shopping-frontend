<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public  function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
