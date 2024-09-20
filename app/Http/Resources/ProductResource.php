<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'description_short' => $this->description_short,
            'picture' => $this->picture,
            'catalogs' => $this->when($this->catalogs()->exists(), CatalogResource::collection($this->catalogs)),
            'counts' => $this->when($this->catalogs()->exists(), $this->catalogs()->count()),
        ];
    }
}
