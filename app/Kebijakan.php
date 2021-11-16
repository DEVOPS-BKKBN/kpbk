<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    protected $table = 'mst_kebijakan';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class,'id_kebijakan');
    }
}
