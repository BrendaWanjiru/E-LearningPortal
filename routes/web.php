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

    Route::get('/', 'StudentController@homepage');
    Route::get('/registeration', 'StudentController@show');
    Route::get('/userlogin', 'StudentController@login');
    Route::get('/course', 'UserController@course');
    Route::post('/upload', 'UserController@store');

    // admin get routes
    Route::get('/home', 'UserController@home');
    Route::get('/admin/index', 'UserController@index');

    Route::get('/student', 'UserController@index');
    Route::get('/addstudent', 'StudentController@addstudent');


    Route::group(['middleware' => ['auth']], function(){
        Route::get('/department', 'DepartmentController@show');
        Route::post('/department', 'DepartmentController@store');
        Route::delete('/delete', 'DepartmentController@destroy');
    });

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/admincourse', 'CourseController@show');
        Route::get('/addcourse', 'CourseController@create');
        Route::post('/addcourse', 'CourseController@store');
    });

    Route::group(['middleware' => ['auth']], function(){

        Route::get('/professor', 'LecturerController@index');
        Route::get('/professoradd', 'LecturerController@create');
        Route::get('/profile&{id}', 'LecturerController@edit');
        Route::post('/addprofessor', 'LecturerController@store');
    });







