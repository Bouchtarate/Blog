<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/', [PagesController::class, 'index']);
Route::resource('/post', postsController::class);
Route::resource('/comment', CommentController::class);
Route::resource('/categories', categoriesController::class);
Route::resource('/profile', profileController::class);
// Route::resource('/admin', AdminController::class)->middleware('owner');

=======
Route::withoutMiddleware([EnsureTokenIsValid::class])->group(function () {
  Route::get('/', [PagesController::class, 'index']);
  Route::resource('/post', postsController::class);
  Route::resource('/comment', CommentController::class);
  Route::resource('/categories', categoriesController::class);
  Route::resource('/profile', profileController::class);
  Route::resource('/admin', AdminController::class)->middleware('owner');

});

>>>>>>> df151d144e0d038026970a3e3706c69885aef356
Auth::routes();