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

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'Api\AuthController@login');
Route::post('client/new', 'Api\ClienteController@create');
Route::get('client/all', 'Api\ClienteController@getAllClients');
Route::post('revision/new', 'Api\RevisionController@create');
Route::get('revision/all', 'Api\RevisionController@getAllRevisions');
