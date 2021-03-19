<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSupplier extends Model
{
    protected $table = 'jenissupplier';
    protected $fillable = ['id','jenis_supplier'];
    protected $primaryKey ='id';

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }
}
