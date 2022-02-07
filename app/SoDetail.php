<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoDetail extends Model
{
    protected $table = 'so_detail';
    protected $fillable = [
        'so_id',
        'product_id',
        'qty',
        'harga'
    ];
}
