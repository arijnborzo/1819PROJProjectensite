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

use App\User;

Route::get('/students', function(){
    $students = DB::table('students')->get();
    return view('students', [
        'students' => $students
        ]
    );
});
//Route::get('/students', function(){
//    $students = DB::table('users')
//        ->rightJoin('students', 'users.id', '=', 'students.id')
//        ->rightJoin('projects', 'students.group_id', '=', 'projects.id')
//        ->get();
//    return view('students', [
//            'students' => $students
//        ]
//    );
//});

Auth::routes();
Route::get('/', 'OverviewController@index')->name('home');
Route::get('/archief', 'OverviewController@archive')->name('archief');
Route::get('/nieuwproject', 'ProjectController@newProject')->name('nieuwproject');
Route::post('/maakproject', 'ProjectController@saveProject')->name('maakproject');
Route::get('/belbintest' , 'BelbintestController@showBelbintest')->name('belbintest');
Route::get('/belbintest/{type}', 'BelbintestController@addBelbintype')->name('updateBelbintest');
Route::get('/students', 'OverviewController@students')->name('studenten');
Route::get('/project/{id}', 'ProjectController@detail')->name('detail');
Route::get('/myproject', 'ProjectController@myProject')->name('myProject');
Route::get('/sendrequest/{id}', 'GroupmemberController@sendMemberRequest')->name('sendMemberRequest');
Route::post('/changeMember', 'GroupmemberController@addRemoveMember')->name('addRemoveMember');
Route::get('/acceptProject/{id}', 'DocentController@acceptProject')->name('acceptProject');
Route::get('/denyProject/{id}', 'DocentController@denyProject')->name('denyProject');
Route::get('/pendingProject/{id}', 'DocentController@pendingProject')->name('pendingProject');
Route::get('/addMember/{id}', 'OverviewController@addMember')->name('addMember');


