<?php

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
use App\Http\Controllers\ProductController;
Route::resource('/products', ProductController::class);
use App\Http\Controllers\CategoryController;
Route::resource('/categories', CategoryController::class);
use App\Http\Controllers\OptionController;
Route::resource('/options', OptionController::class);
Route::post('/import', [ProductController::class, 'import']);
Route::get('/export', [ProductController::class, 'export']);