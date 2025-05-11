<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'description', 'price', 'old_price', 'slug', 'sku'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function tags()
    {
        return $this->hasMany(ProductTag::class);
    }
    public function images()
    {
    return $this->hasMany(ProductImage::class);
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
    public function discounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_product_id');
    }
}
