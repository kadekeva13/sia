<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['id','nama','jenis_supplier','alamat','no_telp','detail'];
    protected $primaryKey ='id';

    public function jenissupplier()
    {
        return $this->belongsTo(JenisSupplier::class);
    }
    
}
