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

Route::get('/', function () {
    return view('welcome');
});

    
 Route::post('/importcsv', 'Backend\Statical\SocioController@importCSV');
 Route::group([
        'prefix' => 'api/v1'
    ], function () {
        Route::get('prueba/listado1', array('uses' => 'Backend\API\SocioController@getListado1'))->name('prueba.listado1');
        Route::get('prueba/listado2', array('uses' => 'Backend\API\SocioController@getListado2'))->name('prueba.listado2');
        Route::get('prueba/listado3', array('uses' => 'Backend\API\SocioController@getListado3'))->name('prueba.listado3');
        Route::get('prueba/listado4', array('uses' => 'Backend\API\SocioController@getListado4'))->name('prueba.listado4');
        Route::get('prueba/listado5', array('uses' => 'Backend\API\SocioController@getListado5'))->name('prueba.listado5');
        
    });