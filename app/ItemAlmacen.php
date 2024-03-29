<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Almacen;
class ItemAlmacen extends Model
{
    public $timestamps = false;
    protected $table = 'item_almacen';
    protected $primaryKey = "item_almacen_id";

    public function almacen()
    {
        return $this->belongsTo("App\Almacen","almacen_id","almacen_id");
    }

    public function producto_detalle(){
        return $this->hasMany('App\ProductoDetalle','item_almancen_id','item_almacen_id');
    }
}
