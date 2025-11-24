<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\ProtectedRouteAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


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

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'store']);

// Rotas públicas de livros (não precisam de autenticação)
Route::get('/books/search/{term}', [BookController::class, 'search']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);


Route::middleware([ProtectedRouteAuth::class])->group(function () {

    Route::get('/me', [AuthController::class, 'show']);

    Route::get('/account', [AuthController::class, 'retrieveAccount']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
