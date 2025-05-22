<?php

namespace App\Application\Auctions\UseCases;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;
use App\Application\Auctions\DTOs\AuctionDataDTO;
use App\Domains\Auctions\Entities\Auction;
use Carbon\CarbonImmutable;

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

        $auction->title = $data->title;
        $auction->description = $data->description;
        $auction->startPrice = $data->startPrice;
        $auction->terminateAt = new CarbonImmutable($data->terminateAt);

        $this->auctionRepository->save($auction);

        return $auction;
    }
}
