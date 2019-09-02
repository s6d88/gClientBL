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
 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
   Route::middleware(['auth'])->group( function ()
   {
   // 	Route::get('/bon_livraison', 'Bon_LivraisonController@index');
//Route::get('/bon_livraison/create/{clientID?}', 'Bon_LivraisonController@create');
//Route::post('/bon_livraison', 'Bon_LivraisonController@store');

//Route::get('/bon_livraison/{id}/edit', 'Bon_LivraisonController@edit');

//Route::get('/bon_livraison/{id}', 'Bon_LivraisonController@show');

//Route::put('/bon_livraison/{id}', 'Bon_LivraisonController@update');

//Route::delete('/bon_livraison/{id}', 'Bon_LivraisonController@destroy'); --}}


Route::resource('/bon_livraison', 'Bon_LivraisonController');

Route::resource('/clients', 'ClientController');
   });



