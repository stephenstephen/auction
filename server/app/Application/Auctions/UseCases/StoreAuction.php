<?php

namespace App\Application\Auctions\UseCases;

use App\Application\Auctions\DTOs\AuctionDataDTO;
use App\Domains\Auctions\Entities\Auction;
use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;
use Illuminate\Support\Str;
use Carbon\CarbonImmutable;

class StoreAuction
{
    public function __construct(
        private readonly AuctionRepositoryInterface $repository
    ) {}

    public function execute(AuctionDataDTO $data): Auction
    {
        $auction = new Auction(
            id: Str::uuid()->toString(),
            title: $data->title,
            description: $data->description,
            startPrice: $data->startPrice,
            currentPrice: null,
            status: 'active',
            terminateAt: new CarbonImmutable($data->terminateAt),
            sellerId: $data->sellerId,
        );

        $this->repository->save($auction);
        return $auction;
    }
}
