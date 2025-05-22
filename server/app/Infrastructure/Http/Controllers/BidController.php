<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Bids\UseCases\StoreBid;
use App\Application\Bids\UseCases\GetAuctionBids;
use App\Application\Bids\DTOs\BidDataDTO;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class BidController extends Controller
{
    public function store(Request $request, StoreBid $storeBid): JsonResponse
    {
        $validated = $request->validate([
            'auction_id' => 'required|uuid|exists:auctions,id',
            'price' => 'required|numeric|min:0.01',
        ]);

        $bidData = new BidDataDTO(
            auctionId: $validated['auction_id'],
            userId: Auth::id(),
            price: (float)$validated['price']
        );

        $bid = $storeBid->execute($bidData);
        return response()->json($bid, 201);
    }

    public function index(string $auctionId, GetAuctionBids $getBids): JsonResponse
    {
        $bids = $getBids->execute($auctionId);
        return response()->json($bids);
    }
}
