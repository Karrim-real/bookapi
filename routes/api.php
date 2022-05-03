<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('allbooks', [BookController::class, 'index']);
Route::post('addbook', [BookController::class, 'create']);
Route::get('showbook/{id}', [BookController::class, 'index']);
Route::put('updatebook/{id}', [BookController::class, 'update']);
Route::delete('deletebook/{id}', [BookController::class, 'destroy']);
Route::put('borrowbook/{id}', [BookController::class, 'borrowBook']);


