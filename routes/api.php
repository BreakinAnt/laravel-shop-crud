<?php

use App\Http\Controllers\Api\LojaApiController;
use App\Http\Controllers\Api\LojaProdutoApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('loja-produtos')->name('api.loja-produto.')->group(function () {
    Route::get('/', [LojaProdutoApiController::class, 'index'])->name('index');
    Route::get('/{produto}', [LojaProdutoApiController::class, 'show'])->name('show');
    Route::post('/', [LojaProdutoApiController::class, 'store'])->name('store');
    Route::put('/', [LojaProdutoApiController::class, 'update'])->name('update');
    Route::delete('/', [LojaProdutoApiController::class, 'delete'])->name('delete');
});

Route::prefix('lojas')->name('api.lojas.')->group(function () {
    Route::get('/', [LojaApiController::class, 'index'])->name('index');
    Route::get('/{loja}', [LojaApiController::class, 'show'])->name('show');
    Route::post('/', [LojaApiController::class, 'store'])->name('store');
    Route::put('/', [LojaApiController::class, 'update'])->name('update');
    Route::delete('/', [LojaApiController::class, 'delete'])->name('delete');
});