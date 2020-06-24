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

Route::get('/memos', 'MemoController@index')->name('memo.index');
Route::get('/memo/new', 'MemoController@create')->name('memo.new');
Route::post('/memo', 'MemoController@store')->name('memo.store');
Route::get('/memo/{id}', 'MemoController@show')->name('memo.show');
Route::get('/memo/edit/{id}', 'MemoController@edit')->name('memo.edit');
Route::post('/memo/update/{id}', 'MemoController@update')->name('memo.update');
Route::get('/memo/delete/{id}', 'MemoController@destroy')->name('memo.destroy');

Route::get('/', function(){
    return redirect('/memos');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
