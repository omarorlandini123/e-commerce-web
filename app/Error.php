<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Error 
{
    public  $codigo_error;
    public  $descripcion;

    function __toString(){
       return  json_encode($this);
    }
   
    function __construct($codigo,$descripcion) {		
        $this->codigo=$codigo;
        $this->descripcion=$descripcion;
        
    }

    static function getErrorCode($E_code){
        $codebase = "00000000";
        $codigo = $codebase.$E_code;
        $codigo4 = substr($codigo, -4);
        $codigorpta= "E_".$codigo4;
        return $codigorpta;
    }

    static function getError($E_code){
        switch($E_code){
            case 1:
                return new Error(Error::getErrorCode($E_code),"El numero a enviar está vacío");
            case 2:
                return new Error(Error::getErrorCode($E_code),"No se ha podido generar el código");
            case 3:
                return new Error(Error::getErrorCode($E_code),"El código a validar está vacío");
            case 4:
                return new Error(Error::getErrorCode($E_code),"El código no se ha encontrado");
            case 5:
                return new Error(Error::getErrorCode($E_code),"El token ingresado es inválido");
            case 6:
                return new Error(Error::getErrorCode($E_code),"Necesita llenar los valores completamente");
            case 7:
                return new Error(Error::getErrorCode($E_code),"No se pudo guardar el usuario");
            case 8:
                return new Error(Error::getErrorCode($E_code),"El DNI ya se encuentra registrado");
            case 9:
                return new Error(Error::getErrorCode($E_code),"No se ha encontrado un usuario asociado");
            case 10:
                return new Error(Error::getErrorCode($E_code), "No se pudo guardar la empresa");
            case 11:
                return new Error(Error::getErrorCode($E_code), "No se encuentra el código de empresa");
            case 12:
                return new Error(Error::getErrorCode($E_code), "Debe ingresar el RUC de su empresa");
            case 13:
                return new Error(Error::getErrorCode($E_code), "El RUC ya se encuentra registrado");
            case 14:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el RUC de su empresa");
        }
    }

    
}


