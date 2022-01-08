<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CandidateDetailController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\PurposeJobController;
use App\Http\Controllers\PurposeLetterController;
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

    Route::get('/edit-profile', [CandidateDetailController::class, 'index'])->name('edit-profile');
    Route::post('/save-profile', [CandidateDetailController::class, 'saveChange'])->name('saveProfile');
    Route::group([
        'as' => 'job-vacancy.',
        'prefix' => 'job-vacancy'
    ], function () {
        Route::get('/', [JobTypeController::class, 'index'])->name('index');
        Route::get('/list', [JobVacancyController::class, 'index'])->name('joblist');
        Route::get('/data', [PurposeLetterController::class, 'index'])->name('data');
        Route::post('/save-letter', [PurposeLetterController::class, 'store'])->name('save');
        Route::get('/new', function () {
            return view('admin.jobvacancy');
        })->name('new');
        Route::post('/new', function () {
            return redirect(route('job-vacancy.index'))->with('success', 'Success publish new news and event');
        })->name('store');
    });

    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin'], function () {
            Route::get('/register', function () {
                return view('admin.register');
            })->name('register');
            Route::get('/announcement', [AnnouncementController::class, 'create'])->name('announce');
            Route::post('/announcement', [AnnouncementController::class, 'save'])->name('set-announce');
            Route::get('/news-event', function () {
                return view('admin.news');
            })->name('news');
            Route::post('/news-event', function () {
                return redirect(route('news'))->with('success', 'Success publish new news and event');
            })->name('store-news');
    });
});
