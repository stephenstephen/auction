<?php

namespace App\Application\Bids\UseCases;

use App\Domains\Bid\Repositories\BidRepositoryInterface;
use App\Domains\Bid\Entities\Bid;
use App\Application\Bids\DTOs\BidDataDTO;

class StoreBid
{
    public function __construct(
        private readonly BidRepositoryInterface $bidRepository
    ) {}

    public function execute(BidDataDTO $data): Bid
    {
        return $this->bidRepository->store([
            'auction_id' => $data->auctionId,
            'user_id' => $data->userId,
            'price' => $data->price,
        ]);
    }
}
