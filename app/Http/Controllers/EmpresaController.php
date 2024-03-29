<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Empresa;
use App\Error;
use App\Freeler;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use App\UsuarioEmpresa;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmpresaController extends Controller
{
    public function eliminar(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $empresaFind = Empresa::where('empresa_id', $idEmpresa)->first();
        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $usuarioEmpresaFind = UsuarioEmpresa::where([
            ['usuario_id', $usuariofind->usuario_id],
            ['empresa_id', $idEmpresa],
            ['is_empresa_propia', 1],
        ])->first();

        if ($empresaFind == null) {
            return Error::getError(19);
        }

        $empresaFind->activo = 0;
        $empresaFind->save();

        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->eliminado = true;
        return $token_usuario_rpta;
    }

    public function getPreviewFromAlmacen(Request $request, $idAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(23);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $almacenFind = Almacen::where('almacen_id', $idAlmacen)->first();
        if ($almacenFind == null) {
            return Error::getError(11);
        }

        $empresaFind = Empresa::where('empresa_id', $almacenFind->empresa_id)->first();
        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $path = storage_path('app/preview_empresa/') . $empresaFind->preview_img;

        if (file_exists($path)) {
            $img = Image::make($path);
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            return $img->response();
        }

        return "";

    }

    public function getPreview(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(23);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $empresaFind = Empresa::where('empresa_id', $idEmpresa)->first();
        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $path = storage_path('app/preview_empresa/') . $empresaFind->preview_img;

        if ($path != "") {

            if (file_exists($path)) {
                $img = Image::make($path);
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                return $img->response();
            }
        }

        return "";

    }

    public function obtener(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $empresaFind = Empresa::where([['empresa_id', $idEmpresa], ['activo', 1]])->first();
        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $usuarioEmpresaFind = UsuarioEmpresa::where([
            ['usuario_id', $usuariofind->usuario_id],
            ['empresa_id', $idEmpresa],
            ['is_empresa_propia', 1],
        ])->first();

        if ($empresaFind == null) {
            return Error::getError(19);
        }

        return $empresa;
    }

    public function listar(Request $request, $token, $condicion)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $this->usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($this->usuariofind == null) {
            return Error::getError(9);
        }

        if ($condicion == null || $condicion == "_") {
            return $empresas = Empresa::whereHas('freeler', function ($q) {
                $q->where('usuario_id', $this->usuariofind->usuario_id);
            })->where('activo', 1)->get();

        }
        return $empresas = Empresa::whereHas('freeler', function ($q) {
            $q->where('usuario_id', $this->usuariofind->usuario_id);
        })->where([['activo', 1], ['empresa_nombre', 'like', '%' . $condicion . '%']])->get();

    }

    public function actualizar(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $empresaFind = Empresa::where('empresa_id', $idEmpresa)->first();

        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $empresaFind->empresa_nombre = $request->input('nombre');
        $empresaFind->empresa_detalle = $request->input('detalle');
        $empresaFind->empresa_RUC = $request->input('ruc');

        if ($request->hasFile('preview')) {
            $nombrePreview = md5(uniqid(rand(), true)) . '.jpg';
            $path = $request->file('preview')->storeAs('preview_empresa', $nombrePreview);
            $empresaFind->preview_img = $nombrePreview;
        }

        $empresaFind->save();
        
$almacenInicialAPP = Almacen::where('empresa_id',$empresaFind->empresa_id)
    ->where('is_almacen_app',1)->first();
        if($almacenInicialAPP->almacen_id > 0){
            $almacenInicialAPP->almacen_nombre = "Almacen - " . $request->input('nombre');
            $almacenInicialAPP->almacen_detalle = "Almacen de APP para " . $request->input('nombre');
            $almacenInicialAPP->save();
        }
        
        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->actualizado = true;
        return $token_usuario_rpta;

    }

    public function registrar(Request $request, $token)
    {

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null ) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $freelerFind = Freeler::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($freelerFind == null) {
            return Error::getError(9);
        }

        $empresaFind = Empresa::where('empresa_RUC', $request->input('ruc'))->get();
        if ($empresaFind != null && count($empresaFind) > 0) {
            return Error::getError(13);
        }

        $empresa_reg = new Empresa;
        $empresa_reg->empresa_nombre = $request->input('nombre');
        $empresa_reg->empresa_detalle = $request->input('detalle');
        $empresa_reg->empresa_RUC = $request->input('ruc');
        $empresa_reg->empresa_tipo = 3;
        $empresa_reg->activo = 1;
        $empresa_reg->freeler_id = $freelerFind->freeler_id;

        if ($request->hasFile('preview')) {
            $nombrePreview = md5(uniqid(rand(), true)) . '.jpg';
            $path = $request->file('preview')->storeAs('preview_empresa', $nombrePreview);
            $empresa_reg->preview_img = $nombrePreview;
        }

        $empresa_reg->save();

        if ($empresa_reg->empresa_id > 0) {

            $almacenInicialAPP = new Almacen;
            $almacenInicialAPP->almacen_nombre = "Almacen - " . $request->input('nombre');
            $almacenInicialAPP->almacen_detalle = "Almacen de APP para " . $request->input('nombre');
            $almacenInicialAPP->is_almacen_app = 1;
            $almacenInicialAPP->empresa_id = $empresa_reg->empresa_id;
            $almacenInicialAPP->activo = 1;
            $almacenInicialAPP->save();
            if ($almacenInicialAPP->almacen_id) {
                $token_usuario_rpta = new TokenUsuario;
                $token_usuario_rpta->registrado = true;
                return $token_usuario_rpta;
            }

        }

        return Error::getError(10);

    }
}
