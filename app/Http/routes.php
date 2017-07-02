<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('home');    
// });
Route::auth();

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', ['as'=>'inicio','uses'=>function () {
		if(Auth::user()->tipo<2)
		{	
			return view('libro.buscar');
		}
		else 
	   return view('dashboard');

	}]);
	//Gestionar
	Route::get('gestionar',function()
	{
		return view('libro.gestionar');
	});
	//Prestamo
	Route::resource('prestamo','PrestamoController');
	Route::get('prestamoDevolver',['as'=>'prestamo.devolver','uses'=>'PrestamoController@devolver']);
	Route::get('api/prestamo','PrestamoController@data');
	Route::get('get/prestamo','PrestamoController@get');
	Route::get('prestamo_busqueda','PrestamoController@indexbusqueda');
	Route::get('prestamo_usuario','PrestamoController@indexusuario');
	//Libro
	Route::resource('libro','LibroController');
	Route::get('reportes/libro','LibroController@reporte');
	Route::get('api/libro','LibroController@data');
	Route::get('api/libro_prestar','LibroController@data_prestar');
	Route::get('get/libro','LibroController@get');
	//categoria
	Route::resource('categoria','CategoriaController');
	Route::get('reportes/categoria','CategoriaController@reporte');
	//usuarios
	Route::resource('user','UsuarioController');	
	Route::get('reportes/user','UsuarioController@reporte');
	Route::get('api/user','UsuarioController@data');
	Route::get('get/user','UsuarioController@get');
	//reporte
	Route::resource('reporte','ReporteController');
	//sancion
	Route::resource('sancion','SancionController');
	//escuela
	Route::get('escuela',function()
	{
		return view('escuela.index');
	});
	

});
