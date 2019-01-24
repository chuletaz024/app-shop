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

Route::get('/', 'TestController@welcome');
Route::get('/rent','RentController@rent');

Route::get('/about','AboutController@about');
Route::get('/asesoria','AsesoriaController@asesoria');
Route::get('/mantenimiento','MantenimientoController@mantenimiento');
Route::get('/cotizacion','CotizacionController@cotizacion');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','productController@show'); //formulario
Route::get('/categories/{category}','CategoryController@show');

Route::get('/search','SearchController@show');

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');

//Grupo de rutas del middleware, para agrupar todas las paginas de administrador
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	//rutas para el CRUD de VENTAS
    Route::get('/products','ProductController@index'); //listado de productos
	Route::get('/products/create','ProductController@create'); //formulario
	Route::post('/products','ProductController@store'); //guardar datos que el usuario ingresa
	Route::get('/products/{id}/edit','ProductController@edit'); //formulario edicion
	Route::post('/products/{id}/edit','ProductController@update'); //actualizar los datos
	Route::delete('/products/{id}','ProductController@destroy'); //formulario de eliminar

	Route::get('/products/{id}/images','ImageController@index'); //formulario de imagenes
	Route::post('/products/{id}/images','ImageController@store'); //subir las imagenes
	Route::delete('/products/{id}/images','ImageController@destroy'); //eliminar las imagenes
	Route::get('/products/{id}/images/select/{image}','ImageController@select'); //destacar imagen

	Route::get('/categories','CategoryController@index'); //listado de productos
	Route::get('/categories/create','CategoryController@create'); //formulario
	Route::post('/categories','CategoryController@store'); //guardar datos que el usuario ingresa
	Route::get('/categories/{category}/edit','CategoryController@edit'); //formulario edicion
	Route::post('/categories/{category}/edit','CategoryController@update'); //actualizar los datos
	Route::delete('/categories/{category}','CategoryController@destroy'); //formulario de eliminar

	//Rutas para el CRUD de RENTAS
	//renta empieza
	Route::get('/productrents', 'ProductRentController@index'); //listado de los productos
	Route::get('/productrents/create', 'ProductRentController@create'); //creacion de los productos
	Route::post('/productrents','ProductRentController@store'); //Guardado de los productos
	Route::get('/productrents/{id}/edit', 'ProductRentController@edit'); //edicion de los productos
	Route::post('/productrents/{id}/edit','ProductRentController@update');
	Route::delete('/productrents/{id}','ProductRentController@destroy');

	Route::get('/productrents/{id}/images','ImageRentController@index'); //formulario de imagenes
	Route::post('/productrents/{id}/images','ImageRentController@store'); //subir las imagenes
	Route::delete('/productrents/{id}/images','ImageRentController@destroy'); //eliminar las imagenes
	Route::get('/productrents/{id}/images/select/{image}','ImageRentController@select'); //destacar imagen


//renta acaba
	

});







