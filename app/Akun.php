<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $fillable = ['nama','jenis_akun','detail',];
    protected $primaryKey ='id';

    public function jenisakun()
    {
        return $this->belongsTo(JenisAkun::class);
    }
}