<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::delete('/posts/trash/{post}',[PostsController::class,'trash'])->name('posts.trash');
Route::get('/posts/trashed',[PostsController::class,'trashed'])->name('posts.trashed');
Route::put('/posts/restore/{post}',[PostsController::class,'restore'])->name('posts.restore');
Route::delete('posts/{id}',[PostsController::class,'destroy'])->name('post.delete');
require __DIR__.'/auth.php';
//
Route::resource('categories', CategoriesController::class);
Route::resource('tags',TagsController::class);

Route::resource('posts', PostsController::class);
