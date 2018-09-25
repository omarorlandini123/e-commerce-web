<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/SolicitarCodigo/{numero}','TokenController@solicitaCodigo');
Route::get('/SolicitarRegistro/{numero}/{codigo}','TokenController@solicitaRegistro');
Route::get('/TokensNumero/{numero}','TokenController@tokensnumero');

Route::group(['middleware' => 'verificar.token'], function () {

    Route::get('/NecesitaRegistro/{token}','TokenController@necesitaRegistro');

    Route::post('/Usuario/Registrar/{token}','UsuarioController@registro');
    Route::get('/Usuario/Login/{token}','UsuarioController@login');
    Route::get('/Usuario/Listar/{token}','UsuarioController@listarUsuarios');
    
    Route::post('/Empresa/Registrar/{token}','EmpresaController@registrar');
    Route::post('/Empresa/Actualizar/{token}','EmpresaController@actualizar');
    Route::get('/Empresa/Listar/{token}','EmpresaController@listar');
    Route::get('/Empresa/Eliminar/{idEmpresa}/{token}','EmpresaController@eliminar');

});


Route::get('/Producto','ProductoController@index');