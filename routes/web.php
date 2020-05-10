<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/todos','TodoController@index');
Route::get('/todos/{id}','TodoController@show');
Route::get('/create','TodoController@create');
Route::post('/store','TodoController@store');
Route::get('/edit/{id}','TodoController@edit');
Route::post('/update/{id}','TodoController@update');
Route::get('/delete/{todo}','TodoController@destroy');
Route::get('/complete/{todo}','TodoController@complete');

