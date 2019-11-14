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
    return view('welcome');
});*/


//Ruta para el login 
Route::get('/', 'UsuarioController@index')->name('inicio');
Route::post('/login', [
    'as' => 'login', 
    'uses' => 'Auth\LoginController@login'
]);

//Ruta para ver los datos del usuario
Route::get('/user', 'UsuarioController@datos')->name('datos');

//Ruta para cerrar sesión
Route::get('/logout', 'UsuarioController@logout')->name('logout');

//Ruta para ver los usuarios
Route::get('/usuarios/ver', 'UsuarioController@ver_usuarios')->name('ver_usuarios');
//Ruta para crear un usuario
Route::get('/usuarios/crear', [
    'as' => 'crear', 
    'uses' => 'UsuarioController@crear'
]);

//Ruta para los empleados
Route::get('/operarios/ver', 'OperarioController@ver_empleados')->name('ver_empleados');
Route::get('/operarios/nuevo', 'OperarioController@nuevo_empleado')->name('nuevo_empleado');
//Ruta para crear empleados
Route::post('/operarios/crear', [
    'as' => 'operario_crear', 
    'uses' => 'OperarioController@crear'
]);
//Ruta para buscar a los empleados por codigo
Route::post('/operarios/buscar', [
    'as' => 'operario_buscar', 
    'uses' => 'OperarioController@buscar'
]);

//Ruta para ver la empresa
Route::get('/empresas/ver', 'EmpresaController@ver_empresas')->name('ver_empresas');
Route::get('/empresas/nueva', 'EmpresaController@nueva_empresa')->name('nueva_empresa');
//Ruta para crear una empresa
Route::post('/empresa/crear', [
    'as' => 'empresa_crear', 
    'uses' => 'EmpresaController@crear'
]);

//Ruta para los productos
Route::get('/productos', 'ProductoController@ver')->name('ver_productos');
Route::get('/productos/nuevo', 'ProductoController@nuevo_producto')->name('nuevo_producto');
//Ruta para crear producto
Route::post('/productos/crear', [
    'as' => 'crear_producto', 
    'uses' => 'ProductoController@crear_producto'
]);

//Ruta para los requerimientos de calidad
Route::get('/requerimientos', 'ProductoController@requerimientos')->name('requerimientos');

//Rutas para la produccion
Route::get('/produccion', 'ProductoController@ver_produccion')->name('ver_produccion');
Route::get('/produccion/nueva/{id}', 'ProductoController@orden_produccion')->name('nueva_produccion');
//Rutas para crear un orden de produccion
Route::post('/produccion/crear', [
    'as' => 'crear_produccion', 
    'uses' => 'ProductoController@crear_produccion'
]);
//Ruta para actualizar las ordenes de produccion
Route::get('/productos/recibir/{id}', 'ProductoController@recibir_produccion')->name('recibir_produccion');
Route::post('/productos/producida/{id}/{ip}', [
    'as' => 'cantidad_producida', 
    'uses' => 'ProductoController@cantidad_producida'
]);

//Rutas para las compras
Route::get('/compra/', 'CompraController@ver_compras')->name('ver_compras');
Route::get('/compra/nueva/{id}', 'CompraController@nueva_compra')->name('nueva_compra');
//Ruta para crear una orden de compra
Route::post('/compra/crear', [
    'as' => 'crear_compra', 
    'uses' => 'CompraController@crear_compra'
]);
//Ruta para denegar o aceptar orden de compra
Route::get('/compra/evaluar/{id}/{op}', 'CompraController@evaluar_compra')->name('evaluar_compra');
//Ruta para recibir ordenes de compra
Route::get('/compra/recibir/{id}', 'CompraController@recibir_compra')->name('recibir_compra');
//Ruta para actualizar la orden de compra
Route::post('/compra/recibida/{id}/{ip}', [
    'as' => 'cantidad_recibida', 
    'uses' => 'CompraController@cantidad_recibida'
]);

//Rutas para ver los rechazos de produccion
Route::get('/rechazos/produccion', 'ProductoController@rechazos_produccion')->name('rechazos_produccion');
Route::get('/rechazos/compras', 'ProductoController@rechazos_compra')->name('rechazos_compra');