<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::resource('videos', VideoController::class);
Route::post('/comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');

