<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    protected $fillable = ['id','gender'];
    protected $primaryKey ='id';

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
