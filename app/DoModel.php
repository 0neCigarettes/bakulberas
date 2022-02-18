<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoModel extends Model
{
    protected $table = 'do';
    protected $fillable = [
        'so_id',
        'kode',
        'tanggal',
        'customer',
        'jumlah',
        'modal',
        'status',
        'diskon',
        'pajak',
        'service',
        'total',
        'due',
        'bayar',
    ];
}
