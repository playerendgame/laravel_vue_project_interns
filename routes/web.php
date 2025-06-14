<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Ajax\Admin\Dashboard\PostController as PostController;
use App\Http\Controllers\Ajax\Admin\Login\LoginController;
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

    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
    Route::get('/', 'LandingPage\HomeController@index')->name('home');
    Route::get('/about', 'LandingPage\AboutController@index')->name('about');
    Route::get('/categories', 'LandingPage\CategoriesController@index')->name('categories');
    Route::get('/beaches', 'BeachesController@index')->name('beaches');
    Route::get('/waterfalls', 'WaterfallsController@index')->name('waterfalls');
    Route::get('/mountainclimbing', 'MountainClimbingController@index')->name('mountainclimbing');
    Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
    Route::get('/blog', 'LandingPage\BlogController@index')->name('blog');
    Route::get('/category_type', 'CategoryController@fetchCategory')->name('category');
    Route::get('/travelblog', 'LandingPage\TravelBlogController@index')->name('travelblog');
    Route::get('/aboutdash', 'Dashboard\AboutDashController@index')->name('aboutdash');
});

Route::post('/add/post/data', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'create'])->name('post-create');
Route::get('/fetch/post', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'list'])->name('post-list');
Route::get('/fetch/post/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'fetchPostPerId']);
Route::post('/update/post/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'update']);
Route::post('/delete/post/{id}', [PostController::class, 'delete']);
Route::post('/register',[App\Http\Controllers\Ajax\Admin\Login\LoginController::class,'register'])->name('register');
Route::post('/login',[App\Http\Controllers\Ajax\Admin\Login\LoginController::class,'login'])->name('login');
Route::post('/logout/user',[App\Http\Controllers\Ajax\Admin\Login\LoginController::class, 'logout'])->name('logout');
Route::post('/update/post/image/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'updatePostImage']);
Route::get('/fetch/posts/by-category/{categoryId}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'getPostsByCategory']);
Route::get('/fetch/all/post', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'AllPosts']);
Route::post('/get-user-by-email', [App\Http\Controllers\Ajax\Admin\InformationController::class, 'getUserByEmail']);
Route::middleware('auth:user')->post('/save/data', [App\Http\Controllers\Ajax\Admin\InformationController::class, 'save'])->name('info-create');
Route::middleware('auth:user')->get('/get-user-info', [App\Http\Controllers\Ajax\Admin\InformationController::class, 'getUserInfo']);
Route::get('/readmore/{id}', [App\Http\Controllers\Ajax\Admin\Dashboard\PostController::class, 'Readmore']);


Route::get('/auth/user', function () {
    return response()->json(Auth::guard('user')->user());
})->name('auth.user');
 