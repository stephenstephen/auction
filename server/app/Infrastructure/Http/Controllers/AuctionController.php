<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Auctions\UseCases\StoreAuction;
use App\Application\Auctions\UseCases\UpdateAuction;
use App\Application\Auctions\UseCases\CloseAuction;
use App\Application\Auctions\UseCases\DeleteAuction;
use App\Application\Auctions\UseCases\ListAuctions;
use App\Application\Auctions\UseCases\GetAuction;
use App\Infrastructure\Http\Requests\AuctionRequest;
use App\Application\Auctions\DTOs\AuctionDataDTO;
use Illuminate\Http\JsonResponse;

class AuctionController
{
    public function __construct(
        private readonly StoreAuction $storeAuction,
        private readonly UpdateAuction $updateAuction,
        private readonly CloseAuction $closeAuction,
        private readonly DeleteAuction $deleteAuction,
        private readonly ListAuctions $listAuctions,
        private readonly GetAuction $getAuction,
    ) {}

    public function store(AuctionRequest $request): JsonResponse
    {
        $auction = $this->storeAuction->execute($request->validated());
        return response()->json([
            'message' => 'Auction created successfully',
            'data' => $auction
        ], 201);
    }

    public function update(string $id, AuctionRequest $request): JsonResponse
    {
        $data = new AuctionDataDTO(
            title: $request->input('title'),
            description: $request->input('description'),
            startPrice: $request->input('start_price'),
            terminateAt: $request->input('terminate_at'),
            sellerId: $request->user()->id
        );

        try {
            $auction = $this->updateAuction->execute($id, $data);

            return response()->json([
                'message' => 'Auction updated successfully',
                'data' => $auction
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function close(string $id): JsonResponse
    {
        try {
            $this->closeAuction->execute($id);
            return response()->json([
                'message' => 'Auction closed successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->deleteAuction->execute($id);
            return response()->json([
                'message' => 'Auction deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function list(): JsonResponse
    {
        $auctions = $this->listAuctions->execute();
        return response()->json($auctions);
    }

    public function get(string $id): JsonResponse
    {
        $auction = $this->getAuction->execute($id);
        return response()->json($auction);
    }
}
