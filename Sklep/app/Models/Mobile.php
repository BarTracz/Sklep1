<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobile extends Model
{
    use HasFactory;

    protected $table = 'mobiles';

    protected $fillable = [
        'product_id',
        'os',
        'ram_size',
        'memory_size',
        'display_size',
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'brand_id', 'id');
    }
}
