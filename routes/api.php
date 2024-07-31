<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/searchquery', 'CourseController@search');
Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('/loggedUser', 'UserController@currentLoggedin');
    Route::post('/logout', 'UserController@logout');
    Route::get('/allcourse', 'CourseController@showcourse');
    Route::get('/departmentList', 'DepartmentController@list');

});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('/refresh', 'UserController@refresh');
});

Route::post('/register', 'UserController@create');
Route::post('/userlogin', 'UserController@signin');
