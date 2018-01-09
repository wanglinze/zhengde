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

Route::group(['middleware' => ['web']], function () {

    Route::get('/','Home\IndexController@index')->name('home');
    
    //TODO
    Route::get('/course/{id}','Home\CourseController@show')->name('course.show');
    Route::get('/news','Home\NewsController@list')->name('news.index');
    Route::get('/news/{id}','Home\NewsController@new')->name('news.show');

});

