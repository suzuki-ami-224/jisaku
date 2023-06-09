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

Auth::routes();
Route::get('/',function(){
    return view('auth.login');
});

// Route::group(['middleware' => 'auth'],function(){
// Route::group(['middleware' => 'can:view,instructor'],function(){
// Route::group(['middleware' => 'can:view,reservation'],function(){

    Route::resource('user', 'UserController');
    Route::resource('admin', 'AdminController');
    Route::resource('instructor', 'InstructorController');
    Route::resource('genre', 'GenreController');
    Route::resource('lesson', 'LessonController');
    Route::resource('reservation', 'ReservationController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/api','LessonController@lesson_creat')->name('lesson.creat');

// });
// });
// });

