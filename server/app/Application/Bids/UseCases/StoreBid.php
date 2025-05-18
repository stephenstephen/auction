<?php

namespace App\Application\Bids\UseCases;

use App\Domains\Bid\Repositories\BidRepositoryInterface;
use App\Domains\Bid\Entities\Bid;

class StoreBidUseCase
{
    public function __construct(
        private readonly BidRepositoryInterface $bidRepository
    ) {}

    public function execute(array $data): Bid
    {
        return $this->bidRepository->store($data);
    }
}
