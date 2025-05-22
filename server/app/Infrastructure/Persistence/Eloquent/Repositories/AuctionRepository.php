<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domains\Auctions\Repositories\AuctionRepositoryInterface;
use App\Domains\Auctions\Entities\Auction;
use App\Infrastructure\Persistence\Eloquent\Models\Auction as EloquentAuction;

class AuctionRepository implements AuctionRepositoryInterface
{
    public function findById(string $id): ?Auction
    {
        $model = EloquentAuction::find($id);
        return $model ? $this->toEntity($model) : null;
    }

    public function findAll(): array
    {
        return EloquentAuction::all()->map(fn($model) => $this->toEntity($model))->all();
    }

    public function save(Auction $auction): void
    {
        $model = EloquentAuction::find($auction->id) ?? new EloquentAuction(['id' => $auction->id]);
        $model->fill([
            'title' => $auction->title,
            'description' => $auction->description,
            'start_price' => $auction->startPrice,
            'terminate_at' => $auction->terminateAt,
            'status' => $auction->status,
            'seller_id' => $auction->sellerId,
        ]);
        $model->save();
    }

    public function delete(string $id): void
    {
        EloquentAuction::destroy($id);
    }

    private function toEntity(EloquentAuction $model): Auction
    {
        return new Auction(
            id: $model->id,
            title: $model->title,
            description: $model->description,
            startPrice: $model->start_price,
            currentPrice: $model->current_price,
            status: $model->status,
            terminateAt: $model->terminate_at,
            sellerId: $model->seller_id,
        );
    }
}

