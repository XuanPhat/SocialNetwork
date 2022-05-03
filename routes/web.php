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
Route::get('/post', function (){
    return view('social_network.post');
})->name('post')->middleware(['auth']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/home',[App\Http\Controllers\HomeController::class, 'upload'])->name('home');
// Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', function (){
//      return view('login');
// })->name('login');