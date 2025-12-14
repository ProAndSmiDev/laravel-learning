<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandingResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'short_description' => $this->description ? mb_substr($this->description, 0, 5) . '...' : '',
            'description' => $this->description,
            'category' => $this->whenLoaded('category', function () {
                return $this->category->name;
            }),
        ];
    }
}
