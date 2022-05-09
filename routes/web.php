<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin')->middleware(['role:admin']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/home',[App\Http\Controllers\HomeController::class, 'upload'])->name('home');
// Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/login', function (){
//      return view('login');
// })->name('login');

//list posts
Route::get('/post',[App\Http\Controllers\Posts\PostController::class, 'index'])->middleware('auth');
// Route::get('/post/create',[App\Http\Controllers\Posts\PostController::class, 'create']);
Route::post('/post',[App\Http\Controllers\Posts\PostController::class, 'store'])->name('post.store');
Route::delete('/post/delete',[App\Http\Controllers\Posts\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/likePost',[App\Http\Controllers\Posts\LikePostController::class, 'likePost'])->name('post.like');
Route::get('/post/unlikePost',[App\Http\Controllers\Posts\LikePostController::class, 'unlikePost'])->name('post.unlike');
Route::put('/post/editPost/{id}',[App\Http\Controllers\Posts\PostController::class, 'update'])->name('update.post');
// comment
Route::post('/post/comment',[App\Http\Controllers\Posts\CommentController::class, 'Addcomment'])->name('post.comment');
Route::put('/post/editComment',[App\Http\Controllers\Posts\CommentController::class, 'update'])->name('update.comment');
Route::delete('/post/deleteComment/{id}',[App\Http\Controllers\Posts\CommentController::class, 'destroy'])->name('destroy.comment');

// Personal
Route::get('/personal/{id}',[App\Http\Controllers\Posts\PersonalController::class, 'show'])->name('personal.show')->middleware('auth');

Route::get('/Editprofile/{id}',[App\Http\Controllers\Posts\ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::put('/Editprofile/{id}',[App\Http\Controllers\Posts\ProfileController::class, 'update'])->name('profile.update');