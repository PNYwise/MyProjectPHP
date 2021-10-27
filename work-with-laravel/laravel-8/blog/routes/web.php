<?php

use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
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
    return view('pages.home',[
        'title'=>'home',
        'active'=>'home',
    ]);
});
Route::get('/about', function () {
    return view('pages.about', [
        'title' => 'about',
        'active' => 'about',
        'name'=>'Bunayya Wahyu',
        'alamat'=>'Jl. Raya Utara No 53',
    ]);
});

Route::get('/posts', [PostController::class,'index']);
Route::get('/post/{post:slug}', [PostController::class,'show']);

Route::get('/categories', function () {
    return view('pages.categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories'=>category::all(),
    ]);
});
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');