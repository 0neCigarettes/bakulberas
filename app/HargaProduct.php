<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaProduct extends Model
{
    protected $table = 'harga_product';
    protected $fillable = ['product_id', 'type_id', 'harga', 'info'];
}
