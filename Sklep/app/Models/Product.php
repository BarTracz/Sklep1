<?php

namespace App\Models;

use App\Models\PC;
use App\Models\Brand;
use App\Models\Laptop;
use App\Models\Mobile;
use App\Models\Smartwatch;
use App\Models\ProductImage;
use App\Models\Old_prices;
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
        'isOnSale',
        'brand_id',
        'category_name',
        'status',
    ];

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function brands() {
        return $this->hasMany(Brand::class, 'id', 'brand_id');
    }

    public function Pc() {
        return $this->hasOne(PC::class, 'product_id', 'id');
    }

    public function Mobile() {
        return $this->hasOne(Mobile::class, 'product_id', 'id');
    }

    public function Laptop() {
        return $this->hasOne(Laptop::class, 'product_id', 'id');
    }

    public function Smartwatch() {
        return $this->hasOne(Smartwatch::class, 'product_id', 'id');
    }

    public function Console() {
        return $this->hasOne(Console::class, 'product_id', 'id');
    }

    public function Old_price() {
        return $this->hasMany(Old_prices::class, 'old_price_id', 'id');
    }
}
