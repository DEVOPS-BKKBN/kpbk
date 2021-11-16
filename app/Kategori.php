<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'mst_kategori';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class,'id_kategori');
    }
}
