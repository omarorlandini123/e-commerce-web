<?php

namespace App;

class Error
{
    public $codigo_error;
    public $descripcion;

    public function __toString()
    {
        return json_encode($this);
    }

    public function __construct($codigo, $descripcion)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;

    }

    public static function getErrorCode($E_code)
    {
        $codebase = "00000000";
        $codigo = $codebase . $E_code;
        $codigo4 = substr($codigo, -4);
        $codigorpta = "E_" . $codigo4;
        return $codigorpta;
    }

    public static function getError($E_code)
    {
        switch ($E_code) {
            case 1:
                return new Error(Error::getErrorCode($E_code), "El numero a enviar está vacío");
            case 2:
                return new Error(Error::getErrorCode($E_code), "No se ha podido generar el código");
            case 3:
                return new Error(Error::getErrorCode($E_code), "El código a validar está vacío");
            case 4:
                return new Error(Error::getErrorCode($E_code), "El código no se ha encontrado");
            case 5:
                return new Error(Error::getErrorCode($E_code), "El token ingresado es inválido");
            case 6:
                return new Error(Error::getErrorCode($E_code), "Necesita llenar los valores completamente");
            case 7:
                return new Error(Error::getErrorCode($E_code), "No se pudo guardar el usuario");
            case 8:
                return new Error(Error::getErrorCode($E_code), "El DNI ya se encuentra registrado");
            case 9:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado un usuario asociado");
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
            case 15:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el almacen");
            case 16:
                return new Error(Error::getErrorCode($E_code), "Debes ingresar el ID de la empresa a la que pertenece el almacen");
            case 17:
                return new Error(Error::getErrorCode($E_code), "No se pudo registrar el almacen");
            case 18:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el item");
            case 19:
                return new Error(Error::getErrorCode($E_code), "La empresa no te pertenece");
            case 20:
                return new Error(Error::getErrorCode($E_code), "Debes asignar el item a un almacén");
            case 21:
                return new Error(Error::getErrorCode($E_code), "No puedes agregar items a una empresa que no es tuya");
            case 22:
                return new Error(Error::getErrorCode($E_code), "No se pudo guardar el item en el almacén");
            case 23:
                return new Error(Error::getErrorCode($E_code), "No se encuentra el usuario relacionado al token");
            case 24:
                return new Error(Error::getErrorCode($E_code), "No es un freeler");
            case 25:
                return new Error(Error::getErrorCode($E_code), "No se encuentran ítems a eliminar");
            case 26:
                return new Error(Error::getErrorCode($E_code), "Debes especificar al menos un ítem a eliminar");
            case 27:
                return new Error(Error::getErrorCode($E_code), "No tienes empresas registradas");
            case 28:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el afiche");
            case 29:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el producto");
            case 30:
                return new Error(Error::getErrorCode($E_code), "Ya existe un usuario con ese correo");
            case 31:
                return new Error(Error::getErrorCode($E_code), "No se ha encontrado el pedido");
        }
    }

}
