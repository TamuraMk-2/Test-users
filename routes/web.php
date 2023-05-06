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
use App\Models\TestUser;
//ブログ一覧画面を表示

Route::get('/','TestUserController@showlist') ->name('tests');

//ブログ詳細画面を表示

Route::get('/testuser/{id}','TestUserController@showDetail') ->name('show');

//ブログ登録画面を表示

Route::get('user/create','TestUserController@showCreate') ->name('create');

//ブログ登録

Route::post('user/store','TestUserController@exeStore') ->name('store');

//ブログ詳細画面を表示

Route::get('/testuser/edit/{id}','TestUserController@showEdit') ->name('edit');

//ブログ登録

Route::post('user/update','TestUserController@exeUpdate') ->name('update');

//ブログ削除
Route::post('user/delete/{id}','TestUserController@exeDelete') ->name('delete');
