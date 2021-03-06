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
// Ruta::metodo('direccion de la vista','NombredeControlador@ClasesDelControlador')
Route::get('/', 'TestController@welcome');
//Rutas de las otras secciones
Route::get('/rent','RentViewController@rent');
Route::get('/about','AboutController@about');
Route::get('/asesoria','AsesoriaController@asesoria');
Route::get('/mantenimiento','MantenimientoController@mantenimiento');
Route::get('/cotizacion','CotizacionController@cotizacion');

//Rutas para resetear la contraseña
Route::get('/password/reset', 'Auth\ForgotPasswordController@ShowLinkRequestForm')->name('password.request');
Route::get('/password/email', 'Auth\ForgotPasswordController@SendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
//Acaba Rutas para resetear password

Auth::routes();
//Rutas de busqueda
Route::get('/search','SearchController@show');
//Ruta para tener los datos de productos en formato json
Route::get('/products/json','SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show'); //formulario
Route::get('/rents/{id}','RentController@show');
Route::get('/categories/{category}','CategoryController@show');

//Rutas para el detalle del carrito de ventas
Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');
//Rutas para el detalle del carrito de rentas
Route::post('/rentcart','RentCartDetailController@store');
Route::delete('/rentcart','RentCartDetailController@destroy');
Route::get('/rentcategories/{rentcategory}','RentCategoryController@show');




Route::post('/rentorder','RentCartController@update');


//Ruta para ver la orden del cliente, 
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
	// Route::get('/productrents', 'ProductRentController@index'); //listado de los productos
	// Route::get('/productrents/create', 'ProductRentController@create'); //creacion de los productos
	// Route::post('/productrents','ProductRentController@store'); //Guardado de los productos
	// Route::get('/productrents/{id}/edit', 'ProductRentController@edit'); //edicion de los productos
	// Route::post('/productrents/{id}/edit','ProductRentController@update');
	// Route::delete('/productrents/{id}','ProductRentController@destroy');

	// Route::get('/productrents/{id}/images','ImageRentController@index'); //formulario de imagenes
	// Route::post('/productrents/{id}/images','ImageRentController@store'); //subir las imagenes
	// Route::delete('/productrents/{id}/images','ImageRentController@destroy'); //eliminar las imagenes
	// Route::get('/productrents/{id}/images/select/{image}','ImageRentController@select'); //destacar imagen
	//renta acaba

	//CRUD PARA LA SECCION DE RENTA (NUEVO)
	Route::get('/rents', 'RentController@index'); //listado de rentas
	Route::get('/rents/create', 'RentController@create');
	Route::post('/rents', 'RentController@store');
	Route::get('/rents/{id}/edit', 'RentController@edit'); //edicion de los productos
	Route::post('/rents/{id}/edit','RentController@update');
	Route::delete('/rents/{id}','RentController@destroy');

	Route::get('/rents/{id}/images','RentImageController@index'); //formulario de imagenes
	Route::post('/rents/{id}/images','RentImageController@store'); //subir las imagenes
	Route::delete('/rents/{id}/images','RentImageController@destroy'); //eliminar las imagenes
	Route::get('/rents/{id}/images/select/{image}','RentImageController@select'); //destacar imagen

	Route::get('/rentcategories','RentCategoryController@index'); //listado de productos
	Route::get('/rentcategories/create','RentCategoryController@create'); //formulario
	Route::post('/rentcategories','RentCategoryController@store'); //guardar datos que el usuario ingresa
	Route::get('/rentcategories/{rentcategories}/edit','RentCategoryController@edit'); //formulario edicion
	Route::post('/rentcategories/{rentcategories}/edit','RentCategoryController@update'); //actualizar los datos
	Route::delete('/rentcategories/{rentcategories}','RentCategoryController@destroy'); //formulario de eliminar
	// TERMINA EL CRUD NUEVO
		

});








