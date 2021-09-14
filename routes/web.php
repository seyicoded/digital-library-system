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

Route::get('/', function () {
    return view('user.unauth.index');
});

Route::group(['namespace'=>'Users'], function(){
    // auth
    Route::post('users/register_user', 'Auth@register_user');
});

Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function(){
    Route::get('/login', function(){
        return view('admin.unauth.login');
    });

    Route::get('/login_now', function(){
        return view('admin.unauth.login');
    });

    Route::post('/login_now', 'Auth@login_now');


    Route::middleware(['admin_auth'])->group(function () {
        Route::get('/', 'Home@home');

        // faculty
        Route::get('/add-faculty', 'Home@add_faculty');
        Route::post('/add-faculty', 'Home@add_faculty_now');
        Route::get('/view-faculty', 'Home@view_faculty');

        // department
        Route::get('/add-department', 'Home@add_department');
        Route::post('/add-department', 'Home@add_department_now');
        Route::get('/view-department', 'Home@view_department');
    });
});
