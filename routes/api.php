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

Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);

Route::post('/v1/players', [App\Http\Controllers\Api\V1\PlayersController::class, "playersForTeam"])->middleware('auth:sanctum');
Route::get('/v1/players', [App\Http\Controllers\Api\V1\PlayersController::class, "playersForName"])->middleware('auth:sanctum');