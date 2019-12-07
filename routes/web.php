<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
Route::put('post/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::get('blog/{post}', [PostController::class, 'show'])->name('post.view');

Route::post('comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::get('vue/post', [PostController::class, 'indexVue'])->name('vue.post.index');


