<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Bids\UseCases\StoreBid;
use App\Application\Bids\UseCases\GetAuctionBids;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BidController extends Controller
{
    public function store(Request $request, StoreBid $storeBid): JsonResponse
    {
        $bid = $storeBid->execute($request->only(['auction_id', 'user_id', 'price']));
        return response()->json($bid);
    }

    public function index(string $auctionId, GetAuctionBids $getBids): JsonResponse
    {
        $bids = $getBids->execute($auctionId);
        return response()->json($bids);
    }
}
