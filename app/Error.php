<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Error 
{
    public  $codigo;
    public  $descripcion;

    function __toString(){
       return  json_encode($this);
    }
   
    function __construct($codigo,$descripcion) {		
        $this->codigo=$codigo;
        $this->descripcion=$descripcion;
        
    }

    static function getError($E_code){
        switch($E_code){
            case 1:
                return new Error("E_0001","El numero a enviar está vacío");
            case 2:
                return new Error("E_0002","No se ha podido generar el código");
            case 3:
                return new Error("E_0003","El código a validar está vacío");
            case 4:
                return new Error("E_0004","El código no se ha encontrado");
            case 5:
                return new Error("E_0005","El token ingresado es inválido");
            case 6:
                return new Error("E_0006","Necesita llenar los valores completamente");
            case 7:
                return new Error("E_0007","No se pudo guardar el usuario");
            case 8:
                return new Error("E_0008","El DNI ya se encuentra registrado");
            case 9:
                return new Error("E_0009","No se ha encontrado un usuario asociado");
            case 10:
                return new Error("E_0010", "No se pudo guardar la empresa");
            case 11:
                return new Error("E_0011", "No se encuentra el código de empresa");
        }
    }

    
}


