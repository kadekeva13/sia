<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukubesar extends Model
{
    protected $table = 'bukubesar';
    protected $fillable = ['id_keuangan','id_laporan','jenis_akun', 'keterangan', 'debit', 'kredit'];
    protected $primaryKey ='id';

    
}
