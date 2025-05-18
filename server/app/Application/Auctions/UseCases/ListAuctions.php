<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;

class ListAuctions
{
    public function __construct(
        private readonly AuctionRepositoryInterface $auctionRepository
    ) {}

    public function execute(): array
    {
        return $this->auctionRepository->findAll();
    }
}
