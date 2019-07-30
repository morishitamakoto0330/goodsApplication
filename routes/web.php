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

/*
Route::get('/', function () {
	return view('welcome');
});
 */

Route::get('/', 'GoodsController@index');
Route::get('hello/create', 'HelloController@create');
Route::get('hello/{id}/delete', 'HelloController@delete');

Route::resource('goods', 'GoodsController');



