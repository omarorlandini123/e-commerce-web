<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    private $codigo;
    private $descripcion;
   
    function __construct($codigo,$descripcion) {		
        $this->codigo=$codigo;
        $this->descripcion=$descripcion;
    }

    static function getError($E_code){
        switch($E_code){
            case TipoError::E_0001:
                return new Error("E_0001","El numero a enviar está vacío");
            case TipoError::E_0002:
                return new Error("E_0002","No se ha podido generar el código");
            case TipoError::E_0003:
                return new Error("E_0003","El codigo a validar está vacío");
            case TipoError::E_0004:
                return new Error("E_0004","El codigo no se ha encontrado");
        }
    }

    
}

abstract class TipoError
{
    const E_0001 = 1;
    const E_0002 = 2;
    const E_0003 = 3;
    const E_0004 = 4;
    
}
