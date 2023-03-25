<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Old_prices extends Model
{
    use HasFactory;

    protected $table = 'old_prices';

    protected $fillable = [
        'old_price_id',
        'price',
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'old_price_id', 'id');
    }
}
