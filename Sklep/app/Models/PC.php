<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
