<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freeler extends Model
{
    public $timestamps = false;
    protected $table = 'freeler';
    protected $primaryKey = "freeler_id";

    public function usuario(){
        return $this->belongsTo('App\Usuario','usuario_id','usuario_id');
    }

    public function productos_terceros(){
        return $this->hasMany('App\ProductosTerceros','freeler_id,freeler_id');
    }

    public function empresas(){
        return $this->hasMany('App\Empresa','freeler_id','freeler_id');
    }

}
