<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostsController::class, 'index'])->name(name: 'posts.index');
Route::get('/posts/create', [postsController::class, 'create'])->name(name:'posts.create');
Route::post('/posts', [postsController::class, 'store'])->name(name:'posts.store');


Route::get('/posts/{post}', [postsController::class, 'show'])->name(name:'posts.show');
Route::get('/posts/{post}/edit', [postsController::class, 'edit'])->name(name:'posts.edit');
Route::put('/posts/{post}', [postsController::class, 'update'])->name(name:'posts.update');
Route::delete('/posts/{post}', [postsController::class, 'destroy'])->name(name:'posts.destroy');