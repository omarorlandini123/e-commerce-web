<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AficheDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'afche';
    protected $primaryKey = "afiche_id";

    public function afiche(){
        return $this->belongsTo('App\Afiche', 'afiche_id','afiche_id');
    }

    public function producto(){
        return $this->belongsTo('App\Producto','producto_id','producto_id');
    }

}
