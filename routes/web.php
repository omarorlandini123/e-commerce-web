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
Route::get('/SMS/Pendiente','TokenController@getSMSPendiente');
Route::get('/SMS/{idCola}','TokenController@updateState');

Route::get('/NecesitaRegistro/{token}','TokenController@necesitaRegistro');

Route::post('/Usuario/Registrar/{token}','UsuarioController@registro');
Route::get('/Usuario/Login/{token}','UsuarioController@login');
Route::get('/Usuario/Listar/{token}','UsuarioController@listarUsuarios');
Route::get('/Usuario/Obtener/{token}','UsuarioController@getUsuario');
//------
Route::get('/login','UsuarioController@login')->name('usuario.login');
Route::post('/login','UsuarioController@validar')->name('usuario.validar');
Route::get('/registrar','UsuarioController@registrar_comprador')->name('usuario.registro');
Route::post('/registrar','UsuarioController@crear_comprador')->name('usuario.crear.comprador');

Route::post('/Empresa/Registrar/{token}','EmpresaController@registrar');
Route::post('/Empresa/Actualizar/{idEmpresa}/{token}','EmpresaController@actualizar');
Route::get('/Empresa/Listar/{token}/{condicion}','EmpresaController@listar');
Route::get('/Empresa/Eliminar/{idEmpresa}/{token}','EmpresaController@eliminar');
Route::get('/Empresa/Obtener/{idEmpresa}/{token}','EmpresaController@obtener');
Route::get('/Empresa/Preview/{idEmpresa}/{token}','EmpresaController@getPreview');

Route::get('/Empresa/PreviewAlmacen/{idAlmacen}/{token}','EmpresaController@getPreviewFromAlmacen');

Route::get('/Ubicacion/Listar/{token}','UbicacionController@listarUbicaciones');

Route::get('/Almacen/Usuario/{token}/{condicion}','AlmacenController@listar');

Route::post('/Producto/Crear/{token}','ProductoController@crear');
Route::get('/Producto/Terceros/{token}/{condicion}','ProductoController@listar_productos_terceros');
Route::get('/Producto/Listar/{token}/{condicion}','ProductoController@listar_mis_productos');
Route::get('/Producto/Preview/{idProducto}/{token}','ProductoController@getPreview');
Route::get('/Producto/PreviewTiny/{idProducto}/{token}','ProductoController@getPreviewTiny');
Route::get('/Producto/Eliminar/{idProducto}/{token}','ProductoController@eliminar');
//------Producto WEB
Route::get('/Producto/{idProducto}/{token}','ProductoController@index');
Route::post('/Producto/Pedir/{idProducto}/{token}','ProductoController@confirmar')->name('pedido.confirmar');
Route::get('/Producto/Pedir/{idProducto}/{token}','ProductoController@pedir')->name('producto.pedir');

Route::post('/Afiche/Crear/{token}','AficheController@crear');
Route::get('/Afiche/Obtener/{idAfiche}/{token}','AficheController@obtener');
Route::get('/Afiche/Listar/{token}/{condicion}','AficheController@listar');
Route::get('/Afiche/ListarTerceros/{token}/{condicion}','AficheController@listar_terceros');
Route::get('/Afiche/Preview/{idAfiche}/{token}','AficheController@getPreview');
Route::get('/Afiche/Eliminar/{idAfiche}/{token}','AficheController@eliminar');
Route::post('/GrupoAfiche/Crear/{token}','AficheController@crear_grupo');
Route::post('/GrupoAfiche/Asignar/{token}','AficheController@asignar_grupo');
Route::post('/Afiche/Producto/Quitar/{token}','AficheController@quitar_producto');
//------Afiche WEB
Route::get('/Afiche/{idAfiche}/{token}','AficheController@show');
Route::post('/Afiche/Pedir/{idAfiche}/{token}','AficheController@confirmar')->name('afiche.pedido.confirmar');
Route::get('/Afiche/Pedir/{idAfiche}/{token}','AficheController@pedir')->name('afiche.pedir');

 
Route::get('/Pedido/Listar/{token}','PedidoController@listar')->name('pedido.listar');
Route::get('/Pedido/Terceros/{token}','PedidoController@listar_terceros')->name('pedido.terceros');

Route::get('/Pedido/AfichesListar/{token}','PedidoController@listar_afiches')->name('pedido.listar.afiches');
Route::get('/Pedido/AfichesTerceros/{token}','PedidoController@listar_terceros_afiches')->name('pedido.terceros.afiches');

Route::get('/Pedido/Producto/{idProducto}/{token}','PedidoController@pedidos_producto')->name('pedido.producto');
Route::get('/Pedido/Afiche/{idAfiche}/{token}','PedidoController@pedidos_afiche')->name('pedido.afiche');
Route::get('/Pedido/Enviado/{idPedido}/{token}','PedidoController@enviar_pedido')->name('pedido.enviar');
Route::get('/Pedido/Pagado/{idPedido}/{token}','PedidoController@pagar_pedido')->name('pedido.pagar');
Route::get('/Pedido/Eliminar/{idPedido}/{token}','PedidoController@eliminar_pedido')->name('pedido.eliminar');

Route::get('/logout','TokenController@logout')->name('logout');