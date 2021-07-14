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
use App\Models\Fasesgrupo;
use App\Models\apuesta;

Route::get('/', function () {
//    return view('/home');
    $apuestas = apuesta::all();

    $fasesgrupos = Fasesgrupo::all();
    return view('home', ['fasesgrupos'=> $fasesgrupos, 'apuestas'=> $apuestas]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('equipos', 'equiposController');


Route::resource('fasesgrupos', 'FasesgrupoController');

Route::resource('apuestas', 'apuestaController');


Route::resource('acumulados', 'acumuladoController');