<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("/category", CategoriesController::class)->middleware("auth");
Route::resource("/post", PostsController::class)->middleware("auth");

Route::get('/c/{id}/{slug}', [HomeController::class, 'getCategory'])->name('category.single');
Route::get('/p/{id}/{slug}', [HomeController::class, 'getPost'])->name('post.single');

require __DIR__.'/auth.php';
