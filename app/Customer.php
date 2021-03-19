<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['id','nama','email','notelp','alamat','gender'];
    protected $primaryKey ='id';

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    
}
