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

Route::get  ('/SolicitarCodigo/{numero}'                ,'TokenController@solicitaCodigo');
Route::get  ('/SolicitarRegistro/{numero}/{codigo}'     ,'TokenController@solicitaRegistro');
Route::get  ('/NecesitaRegistro/{token}'                ,'TokenController@necesitaRegistro');
Route::get  ('/TokensNumero/{numero}'                   ,'TokenController@tokensnumero');

Route::post ('/RegistrarUsuario/{token}'                ,'UsuarioController@registro');
Route::get  ('/Usuario/{token}/login'                   ,'UsuarioController@login');
Route::get  ('/Usuario/{token}/listar'                  ,'UsuarioController@listarUsuarios');


Route::get  ('/Producto'                                ,'ProductoController@index');