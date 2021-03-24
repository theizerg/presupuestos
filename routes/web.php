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

/*Route::get('/', function () {
    return view('test');
});
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

  Route::get('/', 'HomeController@index')->name('home');
  Route::get('user-autocomplete', 'UserController@autocomplete');

  Route::resource('user', 'UserController');
  Route::resource('logins', 'LoginController');
  Route::resource('permission', 'PermissionController');
  Route::resource('roles', 'RolesController');

  /*********************************************************/
  /******************Modulo de administracion**************/
  /*******************************************************/
   Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');


  
  /***************************************************************************
  ***********************************Clientes*****************************
  ****************************************************************************/

  Route::get('/cliente', 'ClientesController@index');
  Route::get('/cliente/nuevo', 'ClientesController@nuevo');
  Route::post('/cliente/guardar', 'ClientesController@guardar');
  Route::get('/clientes/buscar', 'ClientesController@buscar');
  Route::get('/cliente/detalle/{clienteId}', 'ClientesController@detalle');
  /***************************************************************************
  ***********************************Proveedores******************************
  ****************************************************************************/

  Route::get('/proveedores/buscar', 'ProveedorController@buscar');
  
  Route::get('/proveedores', 'ProveedorController@index');
  Route::get('/proveedores/nuevo', 'ProveedorController@nuevo');
  Route::post('/proveedores/guardar', 'ProveedorController@guardar');
  Route::get('/proveedores/detalle/{proveedor_id}', 'ProveedorController@detalle');


  /***************************************************************************
  ***********************************Clase de servisios***********************
  ****************************************************************************/

  Route::resource('clase', 'ClaseServiciosController');

  /***************************************************************************
  ***********************************Productos********************************
  ****************************************************************************/
  Route::get('/servicios', 'ServiciosController@index');
  Route::get('/servicios/nuevo', 'ServiciosController@nuevo');
  Route::post('/servicios/nuevo', 'ServiciosController@guardar');
  Route::post('/servicios/editar', 'ServiciosController@editar');
  Route::get('/servicios/detalle/{codigo}', 'ServiciosController@detalle');
  Route::get('/servicios/buscar', 'ServiciosController@buscar');

  /***************************************************************************
  ***********************************Presupuestos*****************************
  ****************************************************************************/
  Route::get('/presupuestos', 'PresupuestoController@index');
  Route::get('/presupuestos/nuevo', 'PresupuestoController@nuevo');
  Route::post('/presupuestos/nuevo', 'PresupuestoController@guardar');
  Route::post('/presupuestos/editar', 'PresupuestoController@editar');
  Route::get('/presupuestos/{codigo}/detalle', 'PresupuestoController@detalle');
  Route::get('/presupuestos/{codigo}/editar', 'PresupuestoController@editar');
  Route::get('/presupuestos/imprimir/{codigo}', 'PresupuestoController@imprimir');
   /***************************************************************************
  ***********************************Estadísticas*****************************
  ****************************************************************************/
  Route::get('/ingreso', 'IngresosController@index');
  Route::get('/ingreso/{presupuesto}/nuevo', 'IngresosController@create');
  Route::post('/ingreso/guardar', 'IngresosController@guardar');

});
