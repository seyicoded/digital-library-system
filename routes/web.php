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

    Route::get('users/login_user', function(){return view('user.unauth.index');});
    Route::post('users/login_user', 'Auth@login_user');

    // middleware routes
    Route::middleware(['user_auth'])->group(function () {
        Route::get('/home', 'Home@home');
        Route::get('/get_booking_from_search', 'Home@get_booking_from_search');

        // logout
        Route::get('/logout', function(){
            setcookie(sha1('is_user_signed_in_bidemi_project'), md5('true'), intval(time() - 365 * 10 * (86400 * 30)), "/");
            setcookie(sha1('id_for_user_signed_in_bidemi_project'), base64_encode('0'), intval(time() - 365 * 10 * (86400 * 30)), "/");
            setcookie(sha1('matric_for_user_signed_in_bidemi_project'), base64_encode('0'), intval(time() - 365 * 10 * (86400 * 30)), "/");
            return redirect('/');
        });
    });
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

        // student
        Route::get('/add-students', 'Home@add_students');
        Route::post('/add-students', 'Home@add_students_now');
        Route::get('/view-students', 'Home@view_students');
        Route::get('/view-pending-students', 'Home@view_pending_students');
        Route::get('/approve-student', 'Home@approve_student');
        Route::get('/decline-student', 'Home@decline_student');

        // books
        Route::get('/get_department', 'Home@get_department');
        Route::get('/add-books', 'Home@add_books');
        Route::post('/add-books', 'Home@add_books_now');
        Route::get('/view-books', 'Home@view_books');

        // publication
        Route::get('/add-publication', 'Home@add_publication');
        Route::post('/add-publication', 'Home@add_publication_now');
        Route::get('/view-publication', 'Home@view_publication');

        // logout
        Route::get('/logout', function(){
            setcookie(sha1('is_admin_signed_in_bidemi_project'), md5('true'), intval(time() - 365 * 10 * (86400 * 30)), "/");
            setcookie(sha1('id_for_admin_signed_in_bidemi_project'), base64_encode('0'), intval(time() - 365 * 10 * (86400 * 30)), "/");
            return redirect('/admin');
        });

    });
});
