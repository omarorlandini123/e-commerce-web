<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'detalle_pedido';
    protected $primaryKey = "detalle_pedido_id";

    public function pedido(){
        return $this->belongsTo('App\Pedido','pedido_id','pedido_id');
    }

    public function producto(){
        return $this->belongsTo('App\Producto','producto_id','producto_id');
    }

}
