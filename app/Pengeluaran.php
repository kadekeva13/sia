<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = ['id','tgl_pengeluaran','jenis_pengeluaran','detail_pengeluaran','jumlah_pengeluaran'];
    protected $primaryKey ='id';
}
