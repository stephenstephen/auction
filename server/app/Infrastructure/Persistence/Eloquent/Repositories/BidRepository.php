<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domains\Bid\Entities\Bid;
use App\Domains\Bid\Repositories\BidRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Bid as EloquentBid;

class BidRepository implements BidRepositoryInterface
{
    public function store(array $data): Bid
    {
        return EloquentBid::create($data);
    }

    public function getByAuctionId(string $auctionId): Collection
    {
        return EloquentBid::where('auction_id', $auctionId)->get();
    }

    public function getHighestBid(string $auctionId): ?Bid
    {
        return EloquentBid::where('auction_id', $auctionId)->orderByDesc('price')->first();
    }
}
