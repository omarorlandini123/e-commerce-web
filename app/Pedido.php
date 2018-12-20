<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $timestamps = false;
    protected $table = 'pedido';
    protected $primaryKey = "pedido_id";

    public function detalle_pedido(){
        return $this->hasMany('App\Pedido','pedido_id','pedido_id');
    }

    public function comprador(){
        return $this->belongsTo('App\Comprador','comprador_id','comprador_id');
    }

    public function freeler(){
        return $this->belongsTo('App\Freeler','freeler_shared_id','freeler_id');
    }
    

}
