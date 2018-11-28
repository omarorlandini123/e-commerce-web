<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiche extends Model
{
    public $timestamps = false;
    protected $table = 'afche';
    protected $primaryKey = "afiche_id";

    public function empresa()
    {
        return $this->belongsTo("App\Empresa","empresa_id","empresa_id");
    }

    public function afiche_detalle(){
        return $this->hasMany("App\AficheDetalle","afiche_id",'afiche_id');
    }

}
