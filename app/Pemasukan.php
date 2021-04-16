<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';
    protected $fillable = ['id','tgl_pemasukan','jenis_pemasukan','detail_pemasukan','jumlah_pemasukan','total'];
    protected $primaryKey ='id';
}
