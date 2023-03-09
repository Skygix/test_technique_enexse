<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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

Route::get('/v1/agents', [UserController::class, 'index']);
Route::post('/v1/agent', [UserController::class, 'store']);
Route::put('/v1/{userId}', [UserController::class, 'update']);
Route::delete('/v1/{userId}', [UserController::class, 'destroy']);

