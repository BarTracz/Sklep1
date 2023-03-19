<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Smartwatch extends Model
{
    use HasFactory;

    protected $table = 'smartwatches';

    protected $fillable = [
        'product_id',
        'os',
        'has_gps',
        'connection_type',
        'display_size',
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'brand_id', 'id');
    }
}
