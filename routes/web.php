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

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
});

Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('/', 'IndexController@index')->name('admin.home');
    Route::get('info', 'IndexController@info')->name('admin.info');
    Route::get('quit', 'LoginController@quit')->name('admin.quit');
    Route::any('pass', 'IndexController@pass')->name('admin.pass');


    Route::resource('staff', 'StaffController');
    Route::post('staff/change-order', 'StaffController@changeOrder')->name('staff.change-order');

    Route::resource('slides', 'SlidesController');
    Route::post('slides/change-order', 'SlidesController@changeOrder')->name('slides.change-order');

    Route::resource('news', 'NewsController');

    Route::resource('course', 'CourseController');

    Route::resource('category', 'CategoryController');
    Route::post('category/change-order', 'CategoryController@changeOrder')->name('category.change-order');

    Route::resource('article', 'ArticleController');

    Route::resource('links', 'LinksController');
    Route::post('links/change-order', 'LinksController@changeOrder')->name('links.change-order');

    Route::resource('config', 'ConfigController');
    Route::get('config/putfile', 'ConfigController@putFile')->name('config.change-order');
    Route::post('config/change-content', 'ConfigController@changeContent')->name('config.change-content');
    Route::post('config/change-order', 'ConfigController@changeOrder')->name('config.change-order');

    Route::any('upload', 'CommonController@upload')->name('upload');

});
