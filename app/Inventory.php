<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = ['id_pembelian','jenis_inventory','detail'];
    protected $primaryKey ='id';
}
