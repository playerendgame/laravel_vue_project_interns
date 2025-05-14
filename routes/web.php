<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\Admin\Dashboard\PostController;
use App\Http\Controllers\Ajax\Admin\Dashboard\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('App\Http\Controllers\Admin')->group(function() {

    Route::get('/dashboard', 'Dashboard\DashboardController@index');
    Route::get('/home', 'LandingPage\HomeController@index')->name('home');
    Route::get('/about', 'LandingPage\AboutController@index')->name('about');
    Route::get('/categories', 'LandingPage\CategoriesController@index')->name('categories');
    Route::get('/', 'LandingPage\TravelBlogController@index');

});

Route::post('/add/post/data', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'create'])->name('post-create');
Route::get('/fetch/post', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'list'])->name('post-list');
Route::get('/fetch/post/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'fetchPostPerId']);
Route::post('/update/post/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'update']);
Route::post('/delete/post/{id}', [PostController::class, 'delete']);
Route::post('/register',[App\Http\Controllers\Ajax\Admin\Login\LoginController::class,'register'])->name('register');
Route::post('/login',[App\Http\Controllers\Ajax\Admin\Login\LoginController::class,'login'])->name('login');

