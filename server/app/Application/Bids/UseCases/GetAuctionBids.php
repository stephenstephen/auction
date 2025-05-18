<?php

namespace App\Application\Bids\UseCases;

use App\Domains\Bid\Repositories\BidRepositoryInterface;
use Illuminate\Support\Collection;

class GetAuctionBids
{
    public function __construct(
        private readonly BidRepositoryInterface $bidRepository
    ) {}

    public function execute(string $auctionId): Collection
    {
        return $this->bidRepository->getByAuctionId($auctionId);
    }
}
