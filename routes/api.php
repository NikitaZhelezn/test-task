<?php

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

Route::post('/short-link/generate', [\App\Http\Controllers\Api\LinkController::class, 'generate'])->name('generate.short.link');
Route::get('/users/{country}', [\App\Http\Controllers\Api\UserController::class, 'get']);
Route::post('/upload-pdf', [\App\Http\Controllers\Api\FileController::class, 'uploadPdf']);
