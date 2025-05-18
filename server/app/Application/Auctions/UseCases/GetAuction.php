<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;

class GetAuction
{
    public function __construct(
        private readonly AuctionRepositoryInterface $auctionRepository
    ) {}

    public function execute(string $id): mixed
    {
        return $this->auctionRepository->findById($id);
    }
}
