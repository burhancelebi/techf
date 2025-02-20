<?php

use App\Http\Controllers\Admin\Blogs\BlogController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
Route::resource('blogs', BlogController::class);
