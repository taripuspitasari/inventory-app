<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'total_quantity' => $this->total_quantity,
            'total_amount' => $this->total_amount,
            'details' => CartDetailResource::collection($this->whenLoaded('cartDetails')),
        ];
    }
}
