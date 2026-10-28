<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/buttons', [PublicController::class, 'buttons'])->name('buttons');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');
Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/user/{user}', [PublicController::class, 'user'])->name('user');

Route::resource('/admin/posts', PostController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth', 'password.confirm'])->name('secure');

require __DIR__.'/auth.php';
