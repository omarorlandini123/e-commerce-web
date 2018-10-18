<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosTerceros extends Model
{
    public $timestamps = false;
    protected $table = 'productos_terceros';
    protected $primaryKey = "productos_terceros_id";

    public function freeler(){
        $this->belongsTo('App\Freeler','freeler_id','freeler_id');
    }

    public function producto(){
        $this->belongsTo('App\Producto','producto_id','producto_id');
    }

}
