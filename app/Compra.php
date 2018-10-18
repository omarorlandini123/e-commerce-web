<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CompraDetalle;
use App\Comprador;

class Compra extends Model
{
    public $timestamps = false;
    protected $table = 'compra';
    protected $primaryKey = "compra_id";

    public function compra_detalle(){
        return $this->hasMany('App\CompraDetalle','compra_id','compra_id');
    }

    public function comprador(){
        return $this->belongsTo('App\Comprador','comprador_id','comprador_id');
    }
}
