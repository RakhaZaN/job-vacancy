<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/news-event', function () {
    return view('news');
});

Route::get('/how-to-apply', function () {
    return view('hta');
});

Route::get('/announcement', function () {
    return view('announcement');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/edit-profile', function () {
    return view('editprofile');
});

Route::group(['prefix' => 'job-vacancy'], function () {
    Route::get('/', function () {
        return view('job-vacancy.index');
    });
    Route::get('/list', function () {
        return view('job-vacancy.joblist');
    });
    Route::get('/data', function () {
        return view('job-vacancy.data');
    });
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', function () {
        return view('home');
    });
    Route::post('/register', function () {
        return view('login');
    });
});
