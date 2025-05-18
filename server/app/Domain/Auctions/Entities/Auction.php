<?php

namespace App\Domains\Auctions\Entities;

use Carbon\CarbonImmutable;
use App\Domain\Auctions\Entities\AuctionAttributes;

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

    public function update(AuctionAttributes $data): void
    {
        $this->title = $data->title;
        $this->description = $data->description;
        $this->startPrice = $data->startPrice;
        $this->terminateAt = CarbonImmutable::parse($data->terminateAt);
    }
}
