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
        $pic = [];
        if($this->getMedia()){
            foreach($this->getMedia() as $media){
                $pic[$media->id] = $media->getFullUrl();
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'description_short' => $this->description_short,
            'catalogs' => CatalogResource::collection($this->whenLoaded('catalogs')),
            'pictures' => $this->when(!empty($pic), $pic)
        ];
    }
}
