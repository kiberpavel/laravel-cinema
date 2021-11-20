<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::middleware('auth:api')->post(
    '/film',
    [FilmController::class, 'create']
);
Route::middleware('auth:api')->get(
    '/lead',
    [LeadController::class, 'get']
);
Route::middleware('auth:api')->get(
    '/genre',
    [GenreController::class, 'get']
);
Route::middleware('auth:api')->get(
    '/producer',
    [ProducerController::class, 'get']
);
Route::middleware('auth:api')->get(
    '/films',
    [FilmController::class, 'get']
);
Route::post('/registration', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:api')->post(
    '/logout',
    [UserController::class, 'logout']
);
Route::get('/forbidden', [UserController::class, 'forbidden'])
    ->name('forbidden');
