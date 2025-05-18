<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interfaces
use App\Domain\Auctions\Repositories\AuctionRepositoryInterface;
use App\Domain\Users\Repositories\UserRepositoryInterface;
use App\Domain\Bids\Repositories\BidRepositoryInterface;

// Implémentations concrètes
use App\Infrastructure\Repositories\EloquentAuctionRepository;
use App\Infrastructure\Repositories\EloquentUserRepository;
use App\Infrastructure\Repositories\EloquentBidRepository;

class BindingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuctionRepositoryInterface::class, EloquentAuctionRepository::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(BidRepositoryInterface::class, EloquentBidRepository::class);
    }

    public function boot(): void
    {
        // Optionnel : hooks ou événements
    }
}
