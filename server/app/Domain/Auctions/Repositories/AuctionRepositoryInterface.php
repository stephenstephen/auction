<?php

namespace App\Domains\Auctions\Repositories;

use App\Domains\Auctions\Entities\Auction;

interface AuctionRepositoryInterface
{
    public function save(Auction $auction): void;
    public function findById(string $id): ?Auction;
    public function findAll(): array;
    public function delete(string $id): void;
}
