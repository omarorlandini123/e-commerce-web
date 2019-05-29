<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    public $timestamps = false;
    protected $table = 'administrador';
    protected $primaryKey = "administrador_id";

    public function usuario(){
        return $this->belongsTo('App\Usuario','usuario_id','usuario_id');
    }
}
