<?php

use App\Http\Controllers\Admin\CateAdminController;
use App\Http\Controllers\Admin\GenreAdminController;
use App\Http\Controllers\Admin\MovieAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailMovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('dang-nhap', [AuthController::class,'login']);
Route::get('dang-ki', [AuthController::class,'register']);
Route::post('check_register', [AuthController::class,'check_register']);
Route::post('check_login', [AuthController::class,'check_login'])->middleware("throttle:5,2");
Route::middleware(['admin'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/cate', CateAdminController::class);
    Route::resource('admin/genre', GenreAdminController::class);
    Route::resource('admin/movie', MovieAdminController::class);
    Route::resource('admin/pro', ProController::class);
    Route::post('delete_pro', [ProController::class,'delete_pro']);
    Route::get('show_pro', [ProController::class,'show_pro']);
    Route::post('update_pro', [ProController::class,'update_pro']);
    
});


Route::get('viewer', [VisitorController::class,'viewer']);
Route::middleware(['user'])->group(function () {
    Route::resource('xem-phim', MovieController::class);
    Route::resource('xem-phim-vip', MovieController::class);
    Route::post('vnpay', [HomeController::class,'vnpay']);
    Route::post('logout', [AuthController::class,'logout']);
});
Route::middleware(['vip'])->group(function () {
    Route::resource('xem-phim-vip', MovieController::class);
});
Route::resource('/', HomeController::class);
Route::get('search', [HomeController::class,'search']);
Route::get('tu-khoa/{tag}', [HomeController::class,'tag']);
Route::resource('chi-tiet-phim', DetailMovieController::class);
Route::resource('danh-muc', CateController::class);
Route::resource('the-loai', GenreController::class);
Route::middleware(['minifile'])->group(function () {
    Route::resource('notfound', NotfoundController::class);
});






