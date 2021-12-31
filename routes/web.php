<?php

use App\Http\Controllers\UserController;
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

Route::get('/login', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'create']);
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [UserController::class, 'authenticate']);
    Route::post('/register', [UserController::class, 'store']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', function () {
        return view('admin.register');
    });
});
