<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = ['id_customer','id_keuangan','nama_penjualan','tgl_penjualan'];
    protected $primaryKey ='id';

    // public function penjualan()
    //  {
    //     return $this->hasMany(Customer::class);
    // }
}
