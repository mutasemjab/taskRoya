<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\SearchController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichf
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', function () {
        return view('front.includes.homeFront');
    })->name('home');

    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // About us
    Route::get('/aboutUs', function () {
        return view('front.includes.about');
    })->name('front.about');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/category/{id}/movies', [ProductController::class, 'moviesByCategory'])->name('category.movies');
    Route::get('/movies/{id}', [ProductController::class, 'show'])->name('movies.show');
});
