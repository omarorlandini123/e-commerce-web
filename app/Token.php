<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $timestamps = false;
    protected $table = 'token';
    protected $primaryKey = "token_id";

    public function usuarios(){
        return $this->belongsToMany(
            "App\Usuario",
            'token_usuario',
            "token_token_id","usuario_usuario_id")
            ->withPivot(
                'token_usuario_fecha_upd',
                'token_usuario_activo');
    }

}
