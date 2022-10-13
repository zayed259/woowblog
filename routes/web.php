<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [BlogController::class, 'home'])->name('blog.home');
Route::get('/blogdetails/{id}', [BlogController::class, 'blogDetails'])->name('blog.blogdetails');


Route::middleware(['auth'])->group(function () {
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blogdel/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

    //comment
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');



});

Route::middleware(['auth','admin'])->group(function () {
    // blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::put('/bloghideshow/{id}', [BlogController::class, 'hideShow'])->name('blog.hideshow');

    Route::get('blogtrashed', [BlogController::class, 'trashed']);
    Route::post('blogtrashed/{id}/restore', [BlogController::class, 'trashedRestore'])->name('blogtrashed.restore');
    Route::post('blogtrashed/{id}/force_delete', [BlogController::class, 'trashedDelete'])->name('blogtrashed.destroy');
    
    //comment
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::put('/commenthideshow/{id}', [CommentController::class, 'hideShow'])->name('comment.hideshow');

});

require __DIR__.'/auth.php';
