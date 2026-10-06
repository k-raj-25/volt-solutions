<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/loans', 'loans')->name('loans');
    Route::get('/real-estate', 'realEstate')->name('real-estate');
    Route::get('/careers', 'careers')->name('careers');
    Route::get('/privacy-policy', 'privacy')->name('privacy');
    Route::get('/terms-and-conditions', 'terms')->name('terms');
    Route::get('/sitemap', 'sitemap')->name('sitemap');
});

Route::redirect('/services', '/', 301);
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap.xml');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [Admin\AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [Admin\AuthController::class, 'login'])->middleware('throttle:6,1');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/', Admin\DashboardController::class)->name('dashboard');
        Route::get('password', [Admin\AuthController::class, 'showPassword'])->name('password');
        Route::put('password', [Admin\AuthController::class, 'updatePassword'])->name('password.update');
        Route::resource('posts', Admin\PostController::class)->except('show');
        Route::resource('messages', Admin\MessageController::class)->only(['index', 'show', 'destroy']);
    });
});
