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
/*Route::get('/belbin', function(){
    return view('belbin');
});*/
Route::get('/nieuwproject', function(){
    return view('nieuwproject');
});

Auth::routes();

Route::get('/', 'OverviewController@index')->name('home');
Route::get('/archief', 'OverviewController@archive')->name('archief');
Route::get('/maakproject', 'ProjectController@createProject')->name('maakproject');
Route::get('/belbintest' , 'BelbintestController@showBelbintest')->name('belbintest');
Route::post('/belbintest', 'BelbintestController@addBelbintype');
Route::get('/studenten', 'OverviewController@students')->name('studenten');
Route::get('/project/{id}', 'OverviewController@detail')->name('detail');
