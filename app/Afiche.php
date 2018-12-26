<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AficheDetalle;
class Afiche extends Model
{
    public $timestamps = false;
    protected $table = 'afiche';
    protected $primaryKey = "afiche_id";

    public function empresa()
    {
        return $this->belongsTo("App\Empresa","empresa_id","empresa_id");
    }

    public function afiche_detalle(){
        return $this->hasMany("App\AficheDetalle","afiche_id",'afiche_id');
    }

    public function grupo_afiche(){
        return $this->hasMany('App\GrupoAfiche','afiche_id','afiche_id');
    }

    public function pedido(){
        return $this->hasMany('App\Pedido','afiche_id','afiche_id');
    }

    public function detalle_sin_grupo(){
        return AficheDetalle::where('afiche_id',$this->afiche_id)->whereNull('grupo_afiche_id')->get();
    }

}
