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

Route::apiResource('/products','ProductController');
Route::group(['prefix'=>'products'],function(){
Route::apiResource('/{product}/reviews','ReviewController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('api/user', function () {
    // Only authenticated users may enter...
})->middleware('auth.basic.once');
