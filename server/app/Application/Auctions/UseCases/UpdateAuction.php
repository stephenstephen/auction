<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;
use App\Application\Auctions\DTOs\AuctionDataDTO;
use App\Domain\Auctions\Entities\AuctionAttributes;
use App\Domains\Auctions\Entities\Auction;

class UpdateAuction
{
    public function __construct(
        private AuctionRepositoryInterface $auctionRepository
    ) {}

    public function execute(int|string $id, AuctionDataDTO $data): Auction
    {
        $auction = $this->auctionRepository->findById($id);

        if (! $auction) {
            throw new \Exception('Auction not found');
        }

        $auction->update(AuctionAttributes::fromDTO($data));

        $this->auctionRepository->save($auction);

        return $auction;
    }
}
