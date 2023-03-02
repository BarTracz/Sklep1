<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
