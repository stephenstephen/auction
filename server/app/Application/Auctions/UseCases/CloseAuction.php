<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;

class CloseAuction
{
    public function __construct(
        private readonly AuctionRepositoryInterface $repository
    ) {}

    public function execute(string $auctionId): void
    {
        $auction = $this->repository->findById($auctionId);

        if (!$auction) {
            throw new \Exception("Auction not found");
        }

        $auction->status = 'closed';
        $this->repository->save($auction);
    }
}