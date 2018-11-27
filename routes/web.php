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

Route::post('/ItemAlmacen/Registrar/{token}','ItemAlmacenController@registrar');
Route::put('/ItemAlmacen/Registrar/{token}','ItemAlmacenController@registrar');
Route::get('/ItemAlmacen/Registrar/{token}','ItemAlmacenController@registrar');
Route::post('/ItemAlmacen/Actualizar/{idItemAlmacen}/{token}','ItemAlmacenController@actualizar');
Route::get('/ItemAlmacen/Listar/{token}/{condicion}','ItemAlmacenController@listar');
Route::get('/ItemAlmacen/Eliminar/{idItemAlmacen}/{token}','ItemAlmacenController@eliminar');
Route::get('/ItemAlmacen/Eliminar/{token}','ItemAlmacenController@eliminar_varios');
Route::get('/ItemAlmacen/Obtener/{idItemAlmacen}/{token}','ItemAlmacenController@obtener');
Route::get('/ItemAlmacen/Preview/{idItemAlmacen}/{token}','ItemAlmacenController@getPreview');

Route::get('/SolicitarCodigo/{numero}','TokenController@solicitaCodigo');
Route::get('/SolicitarRegistro/{numero}/{codigo}','TokenController@solicitaRegistro');
Route::get('/TokensNumero/{numero}','TokenController@tokensnumero');
Route::get('/CodigoSeguridad/{numero}','TokenController@codigoCelular');

Route::get('/NecesitaRegistro/{token}','TokenController@necesitaRegistro');

Route::post('/Usuario/Registrar/{token}','UsuarioController@registro');
Route::get('/Usuario/Login/{token}','UsuarioController@login');
Route::get('/Usuario/Listar/{token}','UsuarioController@listarUsuarios');
Route::get('/Usuario/Obtener/{token}','UsuarioController@getUsuario');

Route::post('/Empresa/Registrar/{token}','EmpresaController@registrar');
Route::post('/Empresa/Actualizar/{idEmpresa}/{token}','EmpresaController@actualizar');
Route::get('/Empresa/Listar/{token}/{condicion}','EmpresaController@listar');
Route::get('/Empresa/Eliminar/{idEmpresa}/{token}','EmpresaController@eliminar');
Route::get('/Empresa/Obtener/{idEmpresa}/{token}','EmpresaController@obtener');

Route::get('/Ubicacion/Listar/{token}','UbicacionController@listarUbicaciones');

Route::get('/Almacen/Usuario/{token}/{condicion}','AlmacenController@listar');

Route::post('/Producto/Crear/{token}','ProductoController@crear');
Route::get('/Producto/Listar/{token}/{condicion}','ProductoController@listar_mis_productos');
Route::get('/Producto/Terceros/{token}/{condicion}','ProductoController@listar_productos_terceros');
Route::get('/Producto/Preview/{idProducto}/{token}','ProductoController@getPreview');