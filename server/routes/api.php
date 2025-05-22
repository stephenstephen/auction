<?php

use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\AuctionController;
use App\Infrastructure\Http\Controllers\BidController;
use App\Infrastructure\Http\Controllers\UserController;
use App\Infrastructure\Http\Controllers\AuthController;

/*completions
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auctions')->group(function () {
    Route::post('/', [AuctionController::class, 'store']);
    Route::put('/{id}', [AuctionController::class, 'update']);
    Route::delete('/{id}', [AuctionController::class, 'delete']);
    Route::get('/', [AuctionController::class, 'list']);
    Route::get('/{id}', [AuctionController::class, 'get']);
    Route::put('/{id}/close', [AuctionController::class, 'close']);
});


Route::prefix('bids')->group(function () {
    Route::post('/', [BidController::class, 'store']);
    Route::get('/{auctionId}', [BidController::class, 'index']);
});

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
