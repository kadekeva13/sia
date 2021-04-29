<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisAkun extends Model
{
    protected $table = 'jenisakun';
    protected $fillable = ['id','jenis_akun'];
    protected $primaryKey ='id';

    public function akun()
    {
        return $this->hasMany(Akun::class);
    }
}
