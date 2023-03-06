<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'trending',
        'brand_id',
        'category_name',
        'status',
    ];

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function brands() {
        return $this->hasMany(Brand::class);
    }
}
