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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/dashboard', '/dashboard/post', 301)->middleware('auth');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::get('/post/me', 'Dashboard\PostController@myPosts')->name('my.posts');
    Route::resource('post', 'Dashboard\PostController');
});