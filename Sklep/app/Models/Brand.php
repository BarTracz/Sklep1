<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function products() {
        return $this->belongsTo(Product::class, 'brand_id', 'id');
    }
}
