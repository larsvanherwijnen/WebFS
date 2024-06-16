<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class DishResource extends JsonResource
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
            'price' => Number::currency($this->price, 'EUR', 'nl'),
            'bare_price' => $this->price, // 'bare_price' is a new key that we added to the array
            'description' => $this->description,
            'menu_number' => $this->menu_number . ($this->menu_number_addition ? '' . $this->menu_number_addition : ''),
            'dish_type' => new DishTypeResource($this->dishType),
        ];
    }
}
