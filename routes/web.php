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

Route::resource('/magasin', 'MagasinController' );

Route::resource('/coiffeur', 'CoiffeurController' );

Route::resource('/rdv', 'RdvController' );

Route::resource('/user', 'UserController' );

Route::get('/s', 'SearchController@index');

Route::post('/s/all', 'SearchController@showAll')->name('s.showwhere');

// Si recherche = vide -> /s/all afficher 5 salons populaires

Route::get('/s', 'SearchController@index');

Route::post('reservation', 'RdvController@calendrier')->name('rdv.calendrier');
Route::get('reservation', 'RdvController@calendrier_home')->name('rdv.calendrier_home');

Auth::routes();

Route::get('gestion','MagasinController@gestion')->name('gestion.magasin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gerant/account','UserController@create_gerant')->name('create.gerant');

Route::post('/magasin','MagasinController@update_table')->name('update.magasin');

Route::resource('/tache', 'TacheController');

