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


//User Route
Route::group(['namespace' => 'User'],function (){
    Route::get('/','HomeController@index');
    Route::get('post/{post}','PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');


});

//Admin Route
Route::group(['namespace' => 'Admin'],function (){
    Route::get('admin/home','HomeController@index')->name('admin.home');

    //User Routes
    Route::resource('admin/user','UserController');

    //Roles Routes
    Route::resource('admin/role','RoleController');

    //Permission Routes
    Route::resource('admin/permission','PermissionController');

    //Post Routes
    Route::resource('admin/post','PostController');

    //Tag Routes
    Route::resource('admin/tag','TagController');

    //Category Routes
    Route::resource('admin/category','CategoryController');

    //Admin Auth Routes
    Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login','Auth\LoginController@login');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
