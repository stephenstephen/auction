<?php

namespace App\Domain\Auctions\Entities;

use App\Application\Auctions\DTOs\AuctionDataDTO;

class AuctionAttributes
{
    public function __construct(
        public string $title,
        public string $description,
        public float $startPrice,
        public string $terminateAt,
        public string $sellerId,
    ) {}

    /**
     * Create from DTO
     */
    public static function fromDTO(AuctionDataDTO $dto): self
    {
        return new self(
            $dto->title,
            $dto->description,
            $dto->startPrice,
            $dto->terminateAt,
            $dto->sellerId,
        );
    }
}
