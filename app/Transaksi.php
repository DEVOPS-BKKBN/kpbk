<?php

namespace App;

use App\Kategori;
use App\Kebijakan;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class Transaksi extends Model
{
    protected $table = 'tr_data';

    protected $fillable = [
        'name', 'file' , 'tahun', 'tipe', 'id_kategori', 'id_kebijakan', 'level', 'id_prov', 'id_kab'
    ];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

   
    public function kebijakans()
    {
        return $this->belongsTo(Kebijakan::class,'id_kebijakan');
   	}

    public function getprovs()
    {
      
        return $this->hasOne(Province::class,'id','id_prov');
    }

    public function getcities()
    {
      
        return $this->hasOne(City::class,'id','id_kab');
    }

    public function path()
    {
        return "/{$this->file}";
    }
}
