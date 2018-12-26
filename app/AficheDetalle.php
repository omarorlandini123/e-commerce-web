<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AficheDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'afiche_detalle';
    protected $primaryKey = "afiche_detalle_id";

    public function afiche(){
        return $this->belongsTo('App\Afiche', 'afiche_id','afiche_id');
    }

    public function producto(){
        return $this->belongsTo('App\Producto','producto_id','producto_id');
    }

    public function grupo_afiche(){
        return $this->belongsTo('App\GrupoAfiche','grupo_afiche_id','grupo_afiche_id');
    }

}
