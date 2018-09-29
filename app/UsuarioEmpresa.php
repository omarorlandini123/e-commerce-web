<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Empresa;

class UsuarioEmpresa extends Model
{
    public $timestamps = false;
    protected $table = 'usuario_empresa';
    protected $primaryKey = "token_usuario_id";


    public function usuario(){
        return $this->belongsTo("App\Usuario","usuario_id","usuario_id");
    }

    public function token(){
        return $this->belongsTo("App\Empresa","empresa_id","empresa_id");
    }
}
