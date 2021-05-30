<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $with = ['category', 'images'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
