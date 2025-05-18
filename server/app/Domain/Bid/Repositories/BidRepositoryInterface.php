<?php

namespace App\Domains\Bid\Repositories;

use App\Domains\Bid\Entities\Bid;
use Illuminate\Support\Collection;

interface BidRepositoryInterface
{
    public function store(array $data): Bid;
    public function getByAuctionId(string $auctionId): Collection;
    public function getHighestBid(string $auctionId): ?Bid;
}
