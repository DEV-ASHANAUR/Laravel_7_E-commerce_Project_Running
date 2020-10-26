<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Categories::class,'cat_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function manufactur()
    {
        return $this->belongsTo(Manufacture::class,'manufacture_id','id');
    }
    // public function size()
    // {
    //     return $this->belongsToMany(ProductSize::class,'product_id','size_id');
    // }
}
