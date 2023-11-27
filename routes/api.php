<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\ResetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('cate', CategoryController::class);
Route::post('foget', [ResetController::class, 'fogetpass']);
Route::post('reset', [ResetController::class, 'resetpass']);