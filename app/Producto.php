<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = 'producto';
    protected $primaryKey = "producto_id";

    public function empresa(){
        return $this->belongsTo('App\Empresa','empresa_id','empresa_id');
    }

    public function productos_terceros(){
        return $this->hasMany('App\ProductosTerceros','producto_id','producto_id');
    }

    public function producto_detalle(){
        return $this->hasMany('App\ProductoDetalle','producto_id','producto_id');
    }

    public function detalle_pedido(){
        return $this->hasMany('App\PedidoDetalle','producto_id','producto_id');
    }
}
