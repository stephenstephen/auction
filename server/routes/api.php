<?php

namespace App\Interface\Http\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interface\Http\Controllers\AuctionController;
use App\Interface\Http\Controllers\BidController;

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
