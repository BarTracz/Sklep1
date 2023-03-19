<?php

namespace App\Models;

use App\Models\PC;
use App\Models\Brand;
use App\Models\Laptop;
use App\Models\Mobile;
use App\Models\Smartwatch;
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
        return $this->hasMany(Brand::class, 'id', 'brand_id')->where('status', '0');
    }

    public function pc() {
        return $this->hasMany(PC::class, 'id', 'product_id')->where('status', '0');
    }

    public function Mobile() {
        return $this->hasMany(Mobile::class, 'id', 'product_id')->where('status', '0');
    }

    public function Laptop() {
        return $this->hasMany(Laptop::class, 'id', 'product_id')->where('status', '0');
    }

    public function Smartwatch() {
        return $this->hasMany(Smartwatch::class, 'id', 'product_id')->where('status', '0');
    }

    public function Console() {
        return $this->hasMany(Console::class, 'id', 'product_id')->where('status', '0');
    }
}
