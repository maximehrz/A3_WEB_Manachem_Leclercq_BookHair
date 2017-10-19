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

Route::get('/s/all', 'SearchController@showAll');

// Si recherche = vide -> /s/all afficher 5 salons populaires

Route::get('/s/{ville}/{nom}/{date}', 'SearchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
