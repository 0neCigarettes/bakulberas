<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoBayar extends Model
{
    protected $table = 'po_bayar';
    protected $fillable = [
        'po_id',
        'kode',
        'tanggal',
        'jumlah',
        'metode',
        'info'
    ];
}
