<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/portafolio/public/datos/lista');

Route::get('/datos/crear', 'datosController@crear')->name('datos.crear');

Route::get('/datos/lista', 'datosController@lista')->name('lista');

Route::post('/datos/crear', 'datosController@anexar')->name('datos.anexar');

Route::get('/datos/editar/{id}', 'datosController@editar')->name('datos.editar');

Route::put('/datos/editar/{id}', 'datosController@update')->name('datos.update');

Route::delete('/datos/lista/{id}', 'datosController@delete')->name('datos.Eliminar');