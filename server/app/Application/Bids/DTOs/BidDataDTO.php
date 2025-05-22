<?php

namespace App\Application\Bids\DTOs;

class BidDataDTO
{
    public function __construct(
        public string $auctionId,
        public string $userId,
        public float $price,
    ) {}
}
