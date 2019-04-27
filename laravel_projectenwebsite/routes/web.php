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

/*Route::get('/', function () {
    return view('overzicht');
})->middleware('auth');*/
Route::get('/belbin', function(){
    return view('belbin');
});
Route::get('/nieuwproject', function(){
    return view('nieuwproject');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
