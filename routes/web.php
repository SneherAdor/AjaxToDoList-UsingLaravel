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

Route::get('list', 'ListController@index');
Route::get('practice', 'ListController@index1');

Route::post('list', 'ListController@create');
Route::post('practice', 'ListController@create1');

Route::post('delete', 'ListController@delete');
