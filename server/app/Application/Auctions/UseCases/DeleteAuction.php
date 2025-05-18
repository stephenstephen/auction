<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;

class DeleteAuction
{
    public function __construct(
        private readonly AuctionRepositoryInterface $auctionRepository
    ) {}

    public function execute(string $id): void
    {
        $auction = $this->auctionRepository->findById($id);

        if (!$auction) {
            throw new \Exception("Auction not found.");
        }

        $this->auctionRepository->delete($auction->id);
    }
}
