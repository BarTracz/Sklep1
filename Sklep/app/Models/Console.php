<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
