<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class So extends Model
{
    protected $table = 'so';
    protected $fillable = [
        'kode',
        'tanggal',
        'jumlah',
        'seller_id',
        'customer_id',
        'status'
    ];
}
