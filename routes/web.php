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

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [UserController::class, 'authenticate'])->name('login');
    Route::post('/register', [UserController::class, 'store'])->name('register');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function() {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/aboutus', function () {
        return view('aboutus');
    })->name('aboutus');

    Route::get('/news-event', function () {
        return view('news');
    })->name('news');

    Route::get('/how-to-apply', function () {
        return view('hta');
    })->name('hta');

    Route::get('/announcement', function () {
        return view('announcement');
    })->name('announcement');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/edit-profile', function () {
        return view('editprofile');
    })->name('edit-profile');

    Route::group([
        'as' => 'job-vacancy.',
        'prefix' => 'job-vacancy'
    ], function () {
        Route::get('/', function () {
            return view('job-vacancy.index');
        })->name('index');
        Route::get('/list', function () {
            return view('job-vacancy.joblist');
        })->name('joblist');
        Route::get('/data', function () {
            return view('job-vacancy.data');
        })->name('data');
    });

    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin'], function () {
        Route::get('/register', function () {
            return view('admin.register');
        })->name('register');
    });
});
