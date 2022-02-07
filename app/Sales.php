<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'telepon',
        'foto',
        'info'
    ];
}
