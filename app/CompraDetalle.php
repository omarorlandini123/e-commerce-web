<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use App\Compra;
class CompraDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'compra_detalle';
    protected $primaryKey = "compra_detalle_id";

    public function producto(){
        $this->belongsTo('App\Producto','producto_id','producto_id');
    }
    public function compra(){
        $this->belongsTo('App\Compra','compra_id','compra_id');
    }
}
