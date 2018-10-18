<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'producto_detalle';
    protected $primaryKey = "producto_detalle_id";

    public function producto(){
        return $this->belongsTo('App\Producto','producto_id','producto_id');
    }

    public function item_almacen(){
        return $this->belongsTo('App\ItemAlmacen','item_almacen_id','item_almacen_id');
    }

}
