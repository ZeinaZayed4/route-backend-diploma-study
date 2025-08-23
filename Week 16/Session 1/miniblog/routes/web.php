<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/create', 'create');
    Route::post('/posts', 'store');
    Route::get('/posts/{post}', 'show');
    Route::get('/posts/{post}/edit', 'edit');
    Route::patch('/posts/{post}', 'update');
    Route::delete('/posts/{post}', 'destroy');
});
