<?php

namespace App\Domains\Auctions\Entities;

use Carbon\CarbonImmutable;

class Auction
{
    public function __construct(
        public readonly string $id,
        public string $title,
        public string $description,
        public float $startPrice,
        public ?float $currentPrice,
        public string $status,
        public CarbonImmutable $terminateAt,
        public string $sellerId,
    ) {}
}
