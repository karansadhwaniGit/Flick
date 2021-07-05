<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
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

Route::get('/',[FrontendController::class,'index'])->name('blogs.index');
Route::get('/blogs/{post}',[FrontendController::class,'show'])->name('blogs.show');
Route::get('blogs/categories/{category}',[FrontendController::class,'categories'])->name('blogs.categories');
Route::get('blogs/tags/{tag}',[FrontendController::class,'tags'])->name('blogs.tags');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
Route::resource('categories', CategoriesController::class);
Route::resource('tags',TagsController::class);
Route::delete('/posts/trash/{post}',[PostsController::class,'trash'])->name('posts.trash');
Route::get('/posts/trashed',[PostsController::class,'trashed'])->name('posts.trashed');
Route::put('/posts/restore/{post}',[PostsController::class,'restore'])->name('posts.restore');
Route::delete('posts/{id}',[PostsController::class,'destroy'])->name('post.delete');
Route::resource('posts', PostsController::class);
});



require __DIR__.'/auth.php';
//
Route::middleware(['auth','verifyAdmin'])->group(function()
{
Route::resource('users',UserController::class);
});
