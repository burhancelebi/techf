<?php

use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\Categories\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blog.detail');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{id}/blogs', [CategoryController::class, 'blogs'])->name('category.blogs');
