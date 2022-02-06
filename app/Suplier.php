<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'supliers';
    protected $fillable = [
        'kode', 'nama', 'alamat', 'telpon', 'foto', 'info'
    ];
}
