<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PC extends Model
{
    use HasFactory;

    protected $table = 'pcs';

    protected $fillable = [
        'product_id',
        'os',
        'cpu',
        'gpu',
        'ram_type',
        'ram_size',
        'disk1_type',
        'disk1_size',
        'disk2_type',
        'disk2_size',
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'brand_id', 'id');
    }
}
