<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

// Admin area
Route::get('admin', function () {
    return view('admin.auth.login');
});
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('admin/post', 'PostController@index');
    Route::get('admin/tag', 'TagController@index');
    Route::get('admin/tag/create', 'TagController@create');
    Route::post('admin/tag/store', 'TagController@store');
    Route::get('/admin/tag/{id}/edit', 'TagController@edit');
    Route::put('/admin/tag/{id}', 'TagController@update');
    Route::delete('/admin/tag/{id}', 'TagController@destroy');


    Route::get('admin/upload', 'UploadController@index');
// 添加如下路由
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');

});

// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
