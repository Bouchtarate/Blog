<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\profileController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index']);
Route::resource('/post', postsController::class);
Route::resource('/comment', CommentController::class);
Route::resource('/categories', categoriesController::class);
Route::resource('/profile', profileController::class);
Route::resource('/admin', AdminController::class)->middleware('owner');

Auth::routes();           