<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/categories/{id}', 'categories')->name('categories');
});

Route::post('/subscribe/create', [SubscriberController::class, 'store'])->name('subscrive.store');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::resource('blogs', BlogController::class)->middleware('auth')->except('index');

Route::get('/profile/blogs', [BlogController::class, 'myBlogs'])->name('myBlogs')->middleware('auth');

Route::post('/comments/store', [CommentController::class, 'create'])->name('comments.store')->middleware('auth');

require __DIR__ . '/auth.php';
