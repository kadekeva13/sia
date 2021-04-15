<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = ['id_supplier','id_keuangan','nama_pembelian','tgl_pembelian'];
    protected $primaryKey ='id';
}
