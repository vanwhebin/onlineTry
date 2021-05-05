<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;


Route::get('/', function () {
    return redirect('/list');
});

Route::get('/list', [PostController::class, 'index'])->name('post.list');
Route::get('/detail', [PostController::class, 'showDetail'])->name('post.detail');

