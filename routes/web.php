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

// ルートへのアクセスはインデックスアクションを割り当てる
Route::get('/', 'GoodsController@index');
// リソースコントローラーに用意されている7つのアクションへのルーティングを設定する
Route::resource('goods', 'GoodsController');



