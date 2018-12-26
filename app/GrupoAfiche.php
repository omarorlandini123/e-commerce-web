<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoAfiche extends Model
{
    public $timestamps = false;
    protected $table = 'grupo_afiche';
    protected $primaryKey = "grupo_afiche_id";

    public function afiche(){
        return $this->belongsTo('App\Afiche','afiche_id','afiche_id');
    }

    public function afiche_detalle(){
        return $this->hasMany('App\AficheDetalle','grupo_afiche_id','grupo_afiche_id');
    }
}
