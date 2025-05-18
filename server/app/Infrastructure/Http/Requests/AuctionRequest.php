<?php

namespace App\Infrastructure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuctionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'start_price' => 'required|numeric',
            'terminate_at' => 'required|date',
            'seller_id' => 'required|uuid|exists:users,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
