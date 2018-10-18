<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = 'producto';
    protected $primaryKey = "producto_id";

    public function empresa(){
        $this->belongsTo('App\Empresa','empresa_id','empresa_id');
    }

    public function productos_terceros(){
        $this->hasMany('App\ProductosTerceros','producto_id','producto_id');
    }

    public function producto_detalle(){
        $this->hasMany('App\ProductoDetalle','producto_id','producto_id');
    }

    public function compra_detalle(){
        $this->hasMany('App\CompraDetalle','producto_id','producto_id');
    }
}
