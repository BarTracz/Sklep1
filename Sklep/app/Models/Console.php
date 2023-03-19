<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Console extends Model
{
    use HasFactory;

    protected $table = 'consoles';

    protected $fillable = [
        'product_id',
        'type',
        'disk_size',
        'controller_number',
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
