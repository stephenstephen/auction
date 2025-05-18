<?php

namespace App\Domains\Bid\Entities;

use Carbon\CarbonImmutable;

class Bid
{
    public function __construct(
        public readonly string $id,
        public readonly string $auctionId,
        public readonly string $userId,
        public readonly float $amount,
        public readonly CarbonImmutable $createdAt,
    ) {}

    public function updateAmount(float $amount): void
    {
        $this->amount = $amount;
    }
}
