<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
