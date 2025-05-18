<?php

namespace App\Application\Auctions\DTOs;

class AuctionDataDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public float $startPrice,
        public string $terminateAt,
        public string $sellerId,
    ) {}
}
